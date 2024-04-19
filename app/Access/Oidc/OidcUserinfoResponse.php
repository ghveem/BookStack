<?php

namespace BookStack\Access\Oidc;

use Psr\Http\Message\ResponseInterface;

class OidcUserinfoResponse implements ProvidesClaims
{
    protected array $claims = [];
    protected ?OidcJwtWithClaims $jwt = null;

    public function __construct(ResponseInterface $response, string $issuer, array $keys)
    {
        $contentType = $response->getHeader('Content-Type')[0];
        if ($contentType === 'application/json') {
            $this->claims = json_decode($response->getBody()->getContents(), true);
        }

        if ($contentType === 'application/jwt') {
            $this->jwt = new OidcJwtWithClaims($response->getBody()->getContents(), $issuer, $keys);
            $this->claims = $this->jwt->getAllClaims();
        }

        // TODO - Response validation (5.3.4):
            // TODO - Verify that the OP that responded was the intended OP through a TLS server certificate check, per RFC 6125 [RFC6125].
            // TODO - If the Client has provided a userinfo_encrypted_response_alg parameter during Registration, decrypt the UserInfo Response using the keys specified during Registration.
            // TODO - If the response was signed, the Client SHOULD validate the signature according to JWS [JWS].
    }

    /**
     * @throws OidcInvalidTokenException
     */
    public function validate(string $idTokenSub): bool
    {
        if (!is_null($this->jwt)) {
            $this->jwt->validateCommonClaims();
        }

        $sub = $this->getClaim('sub');

        // Spec: v1.0 5.3.2: The sub (subject) Claim MUST always be returned in the UserInfo Response.
        if (!is_string($sub) || empty($sub)) {
            throw new OidcInvalidTokenException("No valid subject value found in userinfo data");
        }

        // Spec: v1.0 5.3.2: The sub Claim in the UserInfo Response MUST be verified to exactly match the sub Claim in the ID Token;
        // if they do not match, the UserInfo Response values MUST NOT be used.
        if ($idTokenSub !== $sub) {
            throw new OidcInvalidTokenException("Subject value provided in the userinfo endpoint does not match the provided ID token value");
        }

        return true;
    }

    public function getClaim(string $claim): mixed
    {
        return $this->claims[$claim] ?? null;
    }

    public function getAllClaims(): array
    {
        return $this->claims;
    }
}
