# Ruby Quest API in Docker

In deze tutorial helpen we je met het opzetten van een API die je gaat gebruiken. 
Ruby quest is een erg bekende dataset/database gebaseerd op een RPG-spelletje. Het doel is het creëren van een levende wereld met verschillende plekken, personen, dieren en alle bijbehoren, zoals wapens om te vechten, armour om te verdedigen en zelf NPC’s om mee te praten. 
Om dit goed te laten verlopen is het belangrijk dat je deze tutorial goed leest, en de commando’s goed overschrijft (of kopieert. Een klein typfoutje kan al zorgen dat het niet werkt. 
Werk dus netjes!

Volg de volgende stappen
1.	Installeer Docker Desktop voor jouw besturingssysteem. 
    1.	Link: [https://docs.docker.com/get-docker/](https://docs.docker.com/get-docker/)
2.	Clone de repository op een goede, makkelijk te vinden plek op je computer: https://github.com/sjwdvc/ruby_api 
    1.	Je kunt ook een zipje downloaden van de repository. 
3.	Kopieer het bestand `.env.example` en geef het de naam `.env` (let op de punt “.”) voor het woordje env.
4.	Open een terminal/command prompt
5.	Navigeer in de terminal naar de map waar je de repository hebt gecloned/gedownload en uitgepakt!
6.	Navigeer in de terminal naar de map genaamd “ruby_api” (als je het zipje hebt gedownloaad zal de naam zijn “ruby_api-master) (deze staat in de repository die je hebt gecloned/gedownload
7.	Voer hetvolgende commando uit:
    1.	`docker-compose up -d`
    2.	De terminal gaat nu heel hard voor je aan de slag, dit kan een paar minuten duren! Het is belangrijk dat je hem rustig zijn ding laat doen. Hij zet nu alles op wat je nodig zult hebben voor de ruby quest API. 
8.	Als het commando klaar is voer je hetvolgende commando uit:
    1.	`docker-compose exec app composer install`
        1.	wacht geduldig tot dit commando is uitgevoerd. 
    2.	`docker-compose exec app php artisan migrate:fresh --seed`
        1.	Wacht geduldig tot dit commando is uitgevoerd
9.	Navigeer naar de url `localhost:8000/api/v1/animals` 
    1.	Als je een webpapgina met JSON-objecten te zien krijgt, dan is je API succesvol ingesteld. 
    2.	De webpagina zou er alsvolgt uit moeten zien:

![The website, after the API has been setup correctly](/readme/API_response.png)
