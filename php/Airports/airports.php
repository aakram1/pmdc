<?php

class Utils
{

	static function startsWith($haystack, $needle)
	{
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}

}

class Collection
{
	public $items = array();

	public function addItem($obj, $key = null) {
		if ($key == null) {
			$this->items[] = $obj;
		}
		else {
			if (isset($this->items[$key])) {
				throw new KeyHasUseException("Key $key already in use.");
			}
			else {
				$this->items[$key] = $obj;
			}
		}
	}

	public function deleteItem($key) {
		if (isset($this->items[$key])) {
			unset($this->items[$key]);
		}
		else {
			throw new KeyInvalidException("Invalid key $key.");
		}
	}

	public function getItem($key) {
		if (isset($this->items[$key])) {
			return $this->items[$key];
		}
		else {
			throw new KeyInvalidException("Invalid key $key.");
		}
	}

	public function keys() {
		return array_keys($this->items);
	}

	public function length() {
		return count($this->items);
	}

	public function keyExists($key) {
		return isset($this->items[$key]);
	}
}


class FileDB
{
	const DB_PATH = "db/";
	private $path;
	private $data = array();

	private static $entities = array();

	public function __construct($path)
	{
		$this->path = $path;
	}

	public static function entity($name)
	{
		$p = self::DB_PATH . $name . ".db";
		if (!file_exists($p)) {
			if (!file_exists(dirname($p))) {
				mkdir(dirname($p), 0755, true);
			}
			$h = touch($p);
		}
		if(!empty(self::$entities[$name])) {
			$db = self::$entities[$name];
		}
		else {
			$db = new FileDB($p);
			$db->readData();
			self::$entities[$name] = $db;
		}

		return $db;
	}

	public function get($key)
	{
		return $this->data[$key];
	}

	public function all()
	{
		return $this->data;
	}

	public function filter($key, $value){
		$col = new Collection();
		foreach($this->data as $row){
			if(isset($row[$key]) && Utils::startsWith($row[$key], $value)){
				$col->addItem($row);
			}
		}

		return $col->items;
	}

	public function filterOne($key, $value){
		foreach($this->data as $row){
			if(isset($row[$key]) && $row[$key]===$value){
				return $row;
			}
		}

		return null;
	}

	public function put($key, $value)
	{
		$this->data[$key] = $value;
		$this->writeData();
	}

	private function readData()
	{
		$this->data = json_decode(file_get_contents($this->path), true);
	}

	private function writeData()
	{
		file_put_contents($this->path, json_encode($this->data));
	}
}

function CityToCode($city)
{
	$airports = FileDB::entity('airports');
	$row = $airports->filterOne('city', $city);
	if (isset($row)) {
		$cityinfo = array('longitude' => $row['lon'], 'latitude' => $row['lat'], 'code' => $row['code']);
		return $cityinfo;
	}
}

function airports($code)
{
	$airports = FileDB::entity('airports');
	return $airports->filter('code', $code);
}


$destination = $_GET["city"];
$cityconverted = explode(",", $destination);
$cityName = $cityconverted[0];
echo $cityName.'<br>';

echo CityToCode($cityName);


?>