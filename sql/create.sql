CREATE TABLE dbo.Ocena_zawodnika_w_meczu (
	zawodnik_ID INT FOREIGN KEY,
	mecz_ID INT FOREIGN KEY,
	Podania_celne INT,
	Strzały INT,
	Strzały_celne INT,
	Bramki_ INT,
	Faule_ INT,
	Żółta_kartka INT,
	Czerwona_kartka INT,
	Czas_gry INT,
	ocena_w_meczu FLOAT)

CREATE TABLE dbo.Ocena_zawodnika_w_sezonie (
	zawodnik_ID INT FOREIGN KEY,
	sezon_ID INT FOREIGN KEY,
	ocena_w_sezonie = 0 FLOAT)

CREATE TABLE dbo.Ocena_zespołu_w_meczu (
	team_ID INT FOREIGN KEY,
	mecz_ID INT FOREIGN KEY,
	Posiadanie_piłki INT,
	Podania_celne INT,
	Strzały INT,
	Strzały_celne INT,
	Bramki_zdobyte INT,
	Bramki_stracone INT,
	Win_or_loss INT,
	Faule INT,
	Żółte_kartki INT,
	Czerwoni_kartki INT,
	Rzuty_wolne INT,
	Rzuty_rożne INT,
	Rzuty_karne INT,
	ocena_w_meczu FLOAT)

CREATE TABLE dbo.Ocena_zespołu_w_sezonie (
	zawodnik_ID INT FOREIGN KEY,
	sezon_ID INT FOREIGN KEY,
	ocena_w_sezonie = 0 FLOAT)
	
CREATE TABLE dbo.TOTY (
	zawodnik_ID INT FOREIGN KEY,
	sezon_ID INT FOREIGN KEY)