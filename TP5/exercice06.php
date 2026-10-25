<?php
class ParentClass
{
    public static function quiSuisJe(): void
    {
        echo "Je suis ParentClass\n";
    }

    public static function tester(): void
    {
        self::quiSuisJe();
        static::quiSuisJe();
    }
}

class EnfantClass extends ParentClass
{
    public static function quiSuisJe(): void
    {
        echo "Je suis EnfantClass\n";
    }
}

EnfantClass::tester();
