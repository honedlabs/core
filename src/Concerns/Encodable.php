<?php

namespace Honed\Core\Concerns;

trait Encodable
{
    /**
     * @var (\Closure(string):string)|null
     */
    protected static $encoder = null;

    /**
     * @var (\Closure(string):string)|null
     */
    protected static $decoder = null;

    /**
     * Configure the encoding function to use for obfuscating values.
     * 
     * @param (\Closure(string):string)|null $encoder
     */
    public static function setEncoder(\Closure $encoder = null): void
    {
        static::$encoder = $encoder;
    }

    /**
     * Configure the decoding function to use for de-obfuscating values.
     * 
     * @param (\Closure(string):string)|null $decoder
     */
    public static function setDecoder(\Closure $decoder = null): void
    {
        static::$decoder = $decoder;
    }

    /**
     * Encode a value using the configured encoder.
     * 
     * @param string $value
     * @return string
     */
    public static function encode(string $value): string
    {
        if (\is_null(static::$encoder)) {
            return encrypt($value);
        }

        return (static::$encoder)($value);
    }

    /**
     * Decode a value using the configured decoder.
     * 
     * @param string $value
     * @return string
     */
    public static function decode(string $value): string
    {
        if (\is_null(static::$decoder)) {
            return decrypt($value);
        }

        return (static::$decoder)($value);
    }

    /**
     * Encode the current class name.
     * 
     * @return string
     */
    public static function encodeClass(): string
    {
        return static::encode(static::class);
    }

    /**
     * Decode a class name.
     * 
     * @param string $value
     * @return class-string
     */
    public static function decodeClass(string $value): string
    {
        return static::decode($value);
    }
}