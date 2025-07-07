<?php

namespace app\models;

use Flight;

class DolibarrModel {

    private $db;

    public function __construct()
    {
        
    }

    /**
     * Insère un nouveau contact dans Dolibarr via l'API
     * @param array $contactData Données du contact à insérer (lastname et firstname)
     * @return array Réponse de l'API Dolibarr
     */
    public function insertContact($contactData) {
        $url = "http://localhost/dolibarr-21.0.1/dolibarr-21.0.1/htdocs/api/index.php/contacts";

        // Votre clé API Dolibarr
        $apiKey = "e3db5354c98af4f54115961151d94969b829821b";  

        // Initialiser cURL
        $ch = curl_init($url);

        // Configurer les options cURL
        curl_setopt($ch, CURLOPT_HTTPHEADER, [//Définit les en-têtes HTTP envoyés avec la requête
            "DOLAPIKEY: $apiKey",
            "Content-Type: application/json",//Définit les en-têtes HTTP envoyés avec la requête
            "Accept: application/json"//Demande une réponse en JSON.
        ]);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//Demande à cURL de retourner la réponse au lieu de l’afficher directement.
        curl_setopt($ch, CURLOPT_POST, true);// Active une requête POST (pour créer un contact).
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contactData));
        //CURLOPT_POSTFIELDS : Envoie les données du contact encodées en JSON.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // seulement pour développement avec certificat auto-signé

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ['error' => curl_error($ch)];
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($response, true);
        $result = $httpCode;

        return $result;
    }
    public function getContact() {
        $url = "http://localhost/dolibarr-21.0.1/dolibarr-21.0.1/htdocs/api/index.php/contacts?sortfield=t.rowid&sortorder=ASC&limit=100";

        // Votre clé API Dolibarr
        $apiKey = "e3db5354c98af4f54115961151d94969b829821b";  

        // Initialiser cURL
        $ch = curl_init($url);

        // Configurer les options cURL
        curl_setopt($ch, CURLOPT_HTTPHEADER, [//Définit les en-têtes HTTP envoyés avec la requête
            "DOLAPIKEY: $apiKey",
            "Content-Type: application/json",//Définit les en-têtes HTTP envoyés avec la requête
            "Accept: application/json"//Demande une réponse en JSON.
        ]);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//Demande à cURL de retourner la réponse au lieu de l’afficher directement.
        //CURLOPT_POSTFIELDS : Envoie les données du contact encodées en JSON.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // seulement pour développement avec certificat auto-signé

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ['error' => curl_error($ch)];
        }

        curl_close($ch);

        $result = json_decode($response, true);
        return $result;
    }
    public function getContactById($id) {
        $url = "http://localhost/dolibarr-21.0.1/dolibarr-21.0.1/htdocs/api/index.php/contacts/$id";

        // Votre clé API Dolibarr
        $apiKey = "e3db5354c98af4f54115961151d94969b829821b";  

        // Initialiser cURL
        $ch = curl_init($url);

        // Configurer les options cURL
        curl_setopt($ch, CURLOPT_HTTPHEADER, [//Définit les en-têtes HTTP envoyés avec la requête
            "DOLAPIKEY: $apiKey",
            "Content-Type: application/json",//Définit les en-têtes HTTP envoyés avec la requête
            "Accept: application/json"//Demande une réponse en JSON.
        ]);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//Demande à cURL de retourner la réponse au lieu de l’afficher directement.
        //CURLOPT_POSTFIELDS : Envoie les données du contact encodées en JSON.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // seulement pour développement avec certificat auto-signé

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ['error' => curl_error($ch)];
        }

        curl_close($ch);

        $result = json_decode($response, true);
        return $result;
    }
    public function deleteContact($id) {
        $url = "http://localhost/dolibarr-21.0.1/dolibarr-21.0.1/htdocs/api/index.php/contacts/$id";

        // Votre clé API Dolibarr
        $apiKey = "e3db5354c98af4f54115961151d94969b829821b";  

        // Initialiser cURL
        $ch = curl_init($url);

        // Configurer les options cURL
        curl_setopt($ch, CURLOPT_HTTPHEADER, [//Définit les en-têtes HTTP envoyés avec la requête
            "DOLAPIKEY: $apiKey",
            "Content-Type: application/json",//Définit les en-têtes HTTP envoyés avec la requête
            "Accept: application/json"//Demande une réponse en JSON.
        ]);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//Demande à cURL de retourner la réponse au lieu de l’afficher directement.
        //CURLOPT_POSTFIELDS : Envoie les données du contact encodées en JSON.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // seulement pour développement avec certificat auto-signé

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ['error' => curl_error($ch)];
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

    }
    public function updateContact($id,$contactData) {
        $url = "http://localhost/dolibarr-21.0.1/dolibarr-21.0.1/htdocs/api/index.php/contacts/$id";

        // Votre clé API Dolibarr
        $apiKey = "e3db5354c98af4f54115961151d94969b829821b";  

        // Initialiser cURL
        $ch = curl_init($url);

        // Configurer les options cURL
        curl_setopt($ch, CURLOPT_HTTPHEADER, [//Définit les en-têtes HTTP envoyés avec la requête
            "DOLAPIKEY: $apiKey",
            "Content-Type: application/json",//Définit les en-têtes HTTP envoyés avec la requête
            "Accept: application/json"//Demande une réponse en JSON.
        ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//Demande à cURL de retourner la réponse au lieu de l’afficher directement.
        curl_setopt($ch, CURLOPT_POST, true);// Active une requête POST (pour créer un contact).
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contactData));
        //CURLOPT_POSTFIELDS : Envoie les données du contact encodées en JSON.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // seulement pour développement avec certificat auto-signé

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ['error' => curl_error($ch)];
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($response, true);
        $result = $httpCode;

        return $result;
    }

    public function getStatus() {
        $url = "https://localhost/dolibarr-21.0.1/dolibarr-21.0.1/htdocs/api/index.php/status";

        // Remplacez par votre clé API Dolibarr
        $apiKey = "e3db5354c98af4f54115961151d94969b829821b";  

        // Initialiser cURL
        $ch = curl_init($url);

        // Ajouter les en-têtes nécessaires
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "DOLAPIKEY: $apiKey",
            "Accept: application/json"
        ]);

        // Retourner le résultat au lieu de l'afficher
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // si localhost avec self-signed certificate

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ['error' => curl_error($ch)];
        }

        curl_close($ch);

        // Décoder la réponse JSON en tableau associatif
        return json_decode($response, true);
    }
}