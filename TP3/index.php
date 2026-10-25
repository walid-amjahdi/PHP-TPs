<?php
class ParentClass {
public static $nom = "Parent";
public static function testerSelf() {
echo self::$nom;
}
public static function testerStatic() {
echo static::$nom;
}
}
class EnfantClass extends ParentClass {
public static $nom = "Enfant";
}
EnfantClass::testerSelf();
echo "<br>";
EnfantClass::testerStatic();
?>