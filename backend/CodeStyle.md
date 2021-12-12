# Code Style Guidelines

## Notationen
- **Upper-Camel-Case** (UCC): MyClassName
- **Lower-Camel-Case** (LCC): myFunctionName
- **Upper-Case** (UC): MYCONSTANT
- **Lower-Case** (LC): mystring
- **Dash** (-D): My-Class-Name (UCC-D)
- **Underscore** (-U): My_Class_Name (UCC-U)

## Documentation
We will use PHPDocumentor standard inline documentation  
https://docs.phpdoc.org/3.0/guide/guides/docblocks.html


### Kommentare
- Kommentare wie 'Ich mache jetzt A' nützen nichts wenn in der nächsten Zeile A gemacht wird. Schreibt z.B. lieber warum A und nicht B gemacht wird.

## Beispiele

### Konstanten
**Notation**: UC-U 
```php
define('MY_CONSTANT_NAME', 'some value');
echo MY_CONSTANT_NAME;
```

### Variablen
**Notation**: LCC 
- Variablen immer vorab unter dem Funktionsheader definieren
- gleiche Variablen mit verkettung initiieren ($varA = $varB = $varC = null)
- Nach möglichkeit Sprechende Namen für Variablen vergeben ($tableAccounts statt $table01)
- Dynamisch zusammengebaute Variablennamen vermeiden!
- Variablen NICHT mit neuen Daten überschreiben, stattdessen neue Variable mit sprechendem Namen anlegen
- Definitiv nicht mehr benötigte variablen mit unset() freigeben
- Temporäre variablen nach Möglichkeit vermeiden und nach Gebrauch freigeben
- Variablen die sich in der Schleife nicht ändern werden DAVOR definiert

```php
$beispielVariable = '';
```

### Funktionen
**Notation**: LCC  
- PHP Standardfunktionen existieren aus gutem Grund, bitte auch benutzen, Zum Beispiel für Datumsformate.  
- Funktionen sollen eine Länge von 50 Zeilen nicht überschreiten.  
- Code bei Bedarf in Unterfunktionen auslagern. Weniger ist Mehr  
- Code der mehr als einmal verwendet wird kommt in eine Eigene Funktion und wird wiederverwendet.
- Funktionen die Arrays zurückgeben sollten das Array vorab definiert sein und return die Variable zurückliefern

```php
/**
* demo function
*
* @param mixed $arg1 does a
* @param mixed $arg2 does b
*/
function myFunction ($arg1, $arg2, ...) {
	//code

	$response = [
		'render' => 'html',
		'data' => [],
	];

	return $response;
}
```

### Klassen
**Notation**: UCC
#### Properties
**Notation**: LCC
### Methoden
**Notation**: LCC

**Sichtbarkeit von Methoden**: Es muss bei jeder Methode und Klassen-Variable die Sichtbarkeit (public / protected / private) angegeben werden!


```php
/**
* Demo class that does nothing special
*/
class MyClass {
	private $options = null;

	/**
	* @param array $options stores all options inside property
	*/
	public function __construct ($options) {
		$this->options = $options;
	}
	//code

	/**
	* Getter Method for name
	* 
	* @return null|string the name
	*/
	public function getName () {
		if(!isset($this->options['name'])) return null;

		return $this->options['name'];
	}
}  
```

### Allgemeines
- Leerzeichen vor und nach der Klammerung
- leerzeichen zwischen Operator und Operant
- Stringverkettung ohne leerzeichen
- Vergleiche nach möglichkeit mit ===
- 0 ist nicht false!
- '' (Leerstring) ist nicht false!
- null ist nicht false
- Strings in einfachen Hochkomma
- In Argumentketten ein Leerzeichen nach dem Komma
- } else if { und } elseif { ist ok solange leerzeichen zur Klammer sind.
- if und else brauchen immer Klammern
- Logische Blöcke durch Leerzeilen trennen
 
```php
if ($condition === true) {
	$varA = 'asdf';
	$varB = 15;

	myFunction('a', 'b');
	$stringConcat = $string.'asdfasdf';

	return $stringConcat;
} else if {
	//code
}
```

### Exceptions
**Notation**: UCC

## Dateien
**Notation**: LC-U
- Dateien die nicht gespeichert werden müssen werden nicht auf die Platte geschrieben. Es gibt immer eine Variante die im RAM generiert wird.

## Arrays
- Arrays sind vor Verwendung zu iniitieren
- Initiierung von Array mit Shorthand
- Numerische Array sind die Pest und sollten entsprechend gemieden werden.
- JSON niemals händisch zusammen bauen. Benutzt json_encode()
- Keys Notation in LCC außer sie kommen aus externer Quelle (Datenbank, API)
- Komma nach dem letzten Array Eintrag. Dadurch wird bei Änderungen im Git nur die neue Zeile angezeigt.
```php
$array = [
	'keyA' => 'valueA',
	'keyB', => 'valueB',
];
```

## Rückgabe von Daten
- Falls gerenderte Daten zurückgegeben werden müssen auch die Rohdaten zurückgeliefert werden.

```php
function doSomething() {
	//code
	return [
		'render' => '', //html
		'data' => [
			//rohdaten
		],
	];
}
```

### Formulare
- Wann immer möglich CSRF Tokens verwenden
