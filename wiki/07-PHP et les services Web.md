# PHP et les services Web

*  🔖 **Introduction**
*  🔖 **Extension SOAP**
*  🔖 **Choisir SOAP ou REST ?**
*  🔖 **Ecriture d'un Web Service REST**

___

## 📑 Introduction aux services Web

Les languages back peuvent s'orienter sans etat pour ne fournir que de la donnée à un client. **Les formats d'intérechanges principaux sont le XML et le JSON**.

___

## 📑 [Extension SOAP](https://www.php.net/manual/fr/book.soap.php)

Soap permet à un **serveur** de fournir des commandes d'interaction sur une url pour qu'un **client** les exécute et récupère de la donnée.

* Extension:

```ini
extension=soap
```
___

## 📑 SoapServer et SoapClient

### 🏷️ **Serveur**

**Un serveur doit fournir un ensemble de méthode** renvoyant du contenu.

```php
class ProductSoapServer
{
    public function show()
    {
        return (new SimpleXMLElement("<product/>"))->saveXML();
    }
}

$server = new SoapServer(null, [
    'uri' => 'http://localhost/product'
]);
$server->setClass('ProductSoapServer');
$server->handle();
```

### 🏷️ **Client**

**Un client peut invoquer les méthodes** du serveur.

```php

$client = new SoapClient(null, [
    "location" => 'http://localhost/server.php',
    "uri" => 'http://localhost/product',
]);
header("Content-Type: application/xml");
echo $client->showAll();
```

___

👨🏻‍💻 Manipulation

Créer un serveur SOAP possédant une méthode de lecture et l'utiliser avec un client qui l'affiche.

___

## 📑 Choisir SOAP ou REST ?

**Soap propose l'utilisation de méthodes dont la référence est utilisée par le client**. **REST se base sur les méthodes HTTP pour décider des actions à invoquer** sur le server via le routing. Il n'expose pas ses identifiants de méthodes qui s'invoquent via la requête HTTP uniquement.

___

## 📑 Manipulation de JSON en PHP

* Convertir un objet ou un tableau en json:

```php
$json = json_encode($oject);
```

* Convertir en object ou en tableau:

```php
$oject = json_decode($json);
```

___

## 📑 Ecriture d'un Web Service REST

### 🏷️ [**Serveur**](https://fr.wikipedia.org/wiki/Representational_state_transfer)

Chaque méthode correspond à une métode HTTP pour une même url.

* GET: lecture.
* POST: création.
* PUT: mise à jour.
* DELETE: suppression.

```php
class ProductsController
{    

    public function get()
    {
        // Fetch $produts
        header("Content-Type: applicaton/json");
        echo json_encode($produts);
    }

    public function post()
    {
        // Persist $produt
        header("Content-Type: applicaton/json");
        echo json_encode($produt);
    }

}
```

### **Client**

* PHP:

```php
$products = json_decode(file_get_contents("http://localhost/products"))
```

* JavaScript:

```js
const xhr = new XMLHttpRequest();
xhr.open("POST", "http://localhost/products");
xhr.onload = () => const product = JSON.parse(xhr.response);
xhr.send("product=" + JSON.stringify({ color: "Red" }));
```

___

👨🏻‍💻 Manipulation

Créer un controllerr REST possédant une méthode de lecture et de création et l'utiliser avec un client qui affiche et créée du contenu.

___