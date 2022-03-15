# Ruby Quest API in Docker

In deze tutorial helpen we je met het opzetten van een API die je gaat gebruiken. 
Ruby quest is een erg bekende dataset/database gebaseerd op een RPG-spelletje. Het doel is het creëren van een levende wereld met verschillende plekken, personen, dieren en alle bijbehoren, zoals wapens om te vechten, armour om te verdedigen en zelf NPC’s om mee te praten. 
Om dit goed te laten verlopen is het belangrijk dat je deze tutorial goed leest, en de commando’s goed overschrijft (of kopieert. Een klein typfoutje kan al zorgen dat het niet werkt. 
Werk dus netjes!

## Volg de volgende stappen
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
    2.	De webpagina zou er alsvolgt uit moeten zien (JSON output in de browser):

![The website, after the API has been setup correctly](/readme/API_response.png)


## Route list
Hieronder zie je een tabel met de mogelijke routes/endpoints die beschikbaar zijn op de API. 
Begin je URL altijd met `localhost:8000` en plak vervolgens het stukje onder het kopje `URI`, uit de tabel hieronder, erachter.

+--------+----------+--------------------------------+----------------------+------------------------------------------------------+------------+
| Domain | Method   | URI                            | Name                 | Action                                               | Middleware |
+--------+----------+--------------------------------+----------------------+------------------------------------------------------+------------+
|        | GET|HEAD | api/v1/animals                 | api.allAnimals       | App\Http\Controllers\AnimalController@index          | api        |
|        | POST     | api/v1/animals/store           | api.storeAnimal      | App\Http\Controllers\AnimalController@store          | api        |
|        | GET|HEAD | api/v1/animals/{animal}        | api.getAnimal        | App\Http\Controllers\AnimalController@show           | api        |
|        | PUT      | api/v1/animals/{animal}        | api.updateAnimal     | App\Http\Controllers\AnimalController@update         | api        |
|        | DELETE   | api/v1/animals/{animal}        | api.destroyAnimal    | App\Http\Controllers\AnimalController@destroy        | api        |
|        | GET|HEAD | api/v1/armors                  | api.allArmors        | App\Http\Controllers\ArmorController@index           | api        |
|        | POST     | api/v1/armors/store            | api.storeArmor       | App\Http\Controllers\ArmorController@store           | api        |
|        | DELETE   | api/v1/armors/{armor}          | api.destroyArmor     | App\Http\Controllers\ArmorController@destroy         | api        |
|        | GET|HEAD | api/v1/armors/{armor}          | api.getArmor         | App\Http\Controllers\ArmorController@show            | api        |
|        | PUT      | api/v1/armors/{armor}          | api.updateArmor      | App\Http\Controllers\ArmorController@update          | api        |
|        | GET|HEAD | api/v1/cities                  | api.allCities        | App\Http\Controllers\CityController@index            | api        |
|        | POST     | api/v1/cities/store            | api.storeCity        | App\Http\Controllers\CityController@store            | api        |
|        | DELETE   | api/v1/cities/{city}           | api.destroyCity      | App\Http\Controllers\CityController@destroy          | api        |
|        | PUT      | api/v1/cities/{city}           | api.updateCity       | App\Http\Controllers\CityController@update           | api        |
|        | GET|HEAD | api/v1/cities/{city}           | api.getCity          | App\Http\Controllers\CityController@show             | api        |
|        | GET|HEAD | api/v1/creatures               | api.allCreatures     | App\Http\Controllers\CreatureController@index        | api        |
|        | POST     | api/v1/creatures/store         | api.storeCreature    | App\Http\Controllers\CreatureController@store        | api        |
|        | DELETE   | api/v1/creatures/{creature}    | api.destroyCreature  | App\Http\Controllers\CreatureController@destroy      | api        |
|        | GET|HEAD | api/v1/creatures/{creature}    | api.getCreature      | App\Http\Controllers\CreatureController@show         | api        |
|        | PUT      | api/v1/creatures/{creature}    | api.updateCreature   | App\Http\Controllers\CreatureController@update       | api        |
|        | GET|HEAD | api/v1/heroes                  | api.allHeroes        | App\Http\Controllers\HeroController@index            | api        |
|        | POST     | api/v1/heroes/store            | api.storeHero        | App\Http\Controllers\HeroController@store            | api        |
|        | PUT      | api/v1/heroes/{hero}           | api.updateHero       | App\Http\Controllers\HeroController@update           | api        |
|        | DELETE   | api/v1/heroes/{hero}           | api.destroyHero      | App\Http\Controllers\HeroController@destroy          | api        |
|        | GET|HEAD | api/v1/heroes/{hero}           | api.getHero          | App\Http\Controllers\HeroController@show             | api        |
|        | GET|HEAD | api/v1/heroeswithperson/{hero} | api.heroesWithPerson | App\Http\Controllers\HeroController@heroesWithPerson | api        |
|        | GET|HEAD | api/v1/highscore               | api.highscores       | App\Http\Controllers\HeroController@highscore        | api        |
|        | GET|HEAD | api/v1/npcs                    | api.allNpcs          | App\Http\Controllers\NpcController@index             | api        |
|        | POST     | api/v1/npcs/store              | api.storeNpc         | App\Http\Controllers\NpcController@store             | api        |
|        | GET|HEAD | api/v1/npcs/{npc}              | api.getNpc           | App\Http\Controllers\NpcController@show              | api        |
|        | PUT      | api/v1/npcs/{npc}              | api.updateNpc        | App\Http\Controllers\NpcController@update            | api        |
|        | DELETE   | api/v1/npcs/{npc}              | api.destroyNpc       | App\Http\Controllers\NpcController@destroy           | api        |
|        | GET|HEAD | api/v1/people                  | api.getPeople        | App\Http\Controllers\PersonController@index          | api        |
|        | POST     | api/v1/people/store            | api.storePerson      | App\Http\Controllers\PersonController@store          | api        |
|        | GET|HEAD | api/v1/people/{person}         | api.getPerson        | App\Http\Controllers\PersonController@show           | api        |
|        | PUT      | api/v1/people/{person}         | api.updatePerson     | App\Http\Controllers\PersonController@update         | api        |
|        | DELETE   | api/v1/people/{person}         | api.destroyPerson    | App\Http\Controllers\PersonController@destroy        | api        |
|        | GET|HEAD | api/v1/quests                  | api.allQuests        | App\Http\Controllers\QuestController@index           | api        |
|        | POST     | api/v1/quests/store            | api.storeQuest       | App\Http\Controllers\QuestController@store           | api        |
|        | GET|HEAD | api/v1/quests/{quest}          | api.getQuest         | App\Http\Controllers\QuestController@show            | api        |
|        | PUT      | api/v1/quests/{quest}          | api.updateQuest      | App\Http\Controllers\QuestController@update          | api        |
|        | DELETE   | api/v1/quests/{quest}          | api.destroyQuest     | App\Http\Controllers\QuestController@destroy         | api        |
|        | GET|HEAD | api/v1/regions                 | api.allRegion        | App\Http\Controllers\RegionController@index          | api        |
|        | POST     | api/v1/regions/store           | api.storeRegion      | App\Http\Controllers\RegionController@store          | api        |
|        | DELETE   | api/v1/regions/{region}        | api.destroyRegion    | App\Http\Controllers\RegionController@destroy        | api        |
|        | GET|HEAD | api/v1/regions/{region}        | api.getRegion        | App\Http\Controllers\RegionController@show           | api        |
|        | PUT      | api/v1/regions/{region}        | api.updateRegion     | App\Http\Controllers\RegionController@update         | api        |
|        | GET|HEAD | api/v1/weapons                 | api.allWeapons       | App\Http\Controllers\WeaponController@index          | api        |
|        | POST     | api/v1/weapons/store           | api.storeWeapon      | App\Http\Controllers\WeaponController@store          | api        |
|        | GET|HEAD | api/v1/weapons/{weapon}        | api.getWeapon        | App\Http\Controllers\WeaponController@show           | api        |
|        | PUT      | api/v1/weapons/{weapon}        | api.updateWeapon     | App\Http\Controllers\WeaponController@update         | api        |
|        | DELETE   | api/v1/weapons/{weapon}        | api.destroyWeapon    | App\Http\Controllers\WeaponController@destroy        | api        |
+--------+----------+--------------------------------+----------------------+------------------------------------------------------+------------+

## Resfresh je database
Wanneer je een tijd bezig bent met dezelfde dataset kan het zijn dat je de database zou willen refreshen en alle originele data weer terug zou willen halen. 
Je kunt dit doen door simpelweg het commando van stap 8.ii van de installatie stappen te herhalen. 

Het commando is: 
`docker-compose exec app php artisan migrate:fresh --seed`. 
Wacht weer netjes tot dit commando is uitgevoerd, en je database is weer gevuld met de originele data. 

