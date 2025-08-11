<?php
namespace Laravel\Sanctum;

trait HasApiTokens
{
    // Placeholder token generation for environments without Sanctum installed
    public function createToken($name)
    {
        return (object) ['plainTextToken' => base64_encode($this->id . '|' . $name)];
    }
}
