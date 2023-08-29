<?php

class ErrorCode
{
  public const INVALID_CREDENTIALS = 1;
  public const LOGIN_FIELDS_REQUIRED = 2;
  public const ACCESS_ERROR = 3;

  public static function getErrorMessage(int $errorCode): string
  {
    switch ($errorCode) {
      case self::INVALID_CREDENTIALS:
        $result = "Les identifiants fournis n'ont pas permis de vous identifier";
        break;
      case self::LOGIN_FIELDS_REQUIRED:
        $result = "Tous les champs du formulaire sont obligatoires";
        break;
        case self::ACCESS_ERROR:
          $result = "Veuillez vous connecter pour accéder à cette page";
          break;
      default:
        $result = "Une erreur est survenue";
    }

    return $result;
  }
}