GO
CREATE PROCEDURE dbo.CALCULATE_PLAYER_RATING
	@zawodnik_ID INT,
	@mecz_ID INT,
	@Podania_celne INT,
	@Strzały INT,
	@Strzały_celne INT,
	@Bramki INT,
	@Faule INT,
	@Żółta_kartka INT,
	@Czerwona_kartka INT,
	@Czas_gry INT
AS
BEGIN
	declare @Ocena float
	SET @Ocena = @Podania_celne*0.1+
					@Strzały*0.2+
					@Strzały_celne*0.5+
					@Bramki*1+
					@Faule*0.3+
					@Żółta_kartka*(-2)+
					@Czerwona_kartka*(-5)+
					@Czas_gry*0.1

	INSERT INTO dbo.Ocena_zawodnika_w_meczu VALUES(
	@zawodnik_ID,
	@mecz_ID,
	@Podania_celne,
	@Strzały,
	@Strzały_celne,
	@Bramki,
	@Faule,
	@Żółta_kartka,
	@Czerwona_kartka,
	@Czas_gry,
	@Ocena
	)
END;	
GO

GO
CREATE PROCEDURE dbo.CALCULATE_PLAYER_SEASON_RATING  @zawodnik_id INT, @sezon_id INT
AS
BEGIN
	declare @Ocena float
	SET @Ocena = select AVG(ocena_w_meczu) from dbo.Ocena_zawodnika_w_meczu group by zawodnik.id having zawodnik.id = @zawodnik_id

	IF EXISTS (SELECT * FROM dbo.Ocena_zawodnika_w_sezonie WHERE zawodnik_id = @zawodnik_id and sezon_id = @sezon_id) 
	BEGIN
		UPDATE dbo.Ocena_zawodnika_w_sezonie
		SET ocena_w_sezonie = @Ocena
		WHERE zawodnik_id = @zawodnik_id and sezon_id = @sezon_id
	END
	ELSE
	BEGIN
		INSERT INTO dbo.Ocena_zawodnika_w_sezonie VALUES(
		@zawodnik_ID,
		@sezon_ID,
		@Ocena
		)
	END
END;
GO

GO
CREATE PROCEDURE dbo.CALCULATE_TEAM_RATING
	@team_ID INT,
	@mecz_ID INT,
	@Posiadanie_piłki INT,
	@Podania_celne INT,
	@Strzały INT,
	@Strzały_celne INT,
	@Bramki_zdobyte INT,
	@Bramki_stracone INT,
	@Win_or_loss INT,
	@Faule INT,
	@Żółte_kartki INT,
	@Czerwoni_kartki INT,
	@Rzuty_wolne INT,
	@Rzuty_rożne INT,
	@Rzuty_karne INT
AS
BEGIN
	declare @Ocena float
	SET @Ocena = @Posiadanie_piłki*0.1+
	@Podania_celne*0.1+
	@Strzały*0.2+
	@Strzały_celne*0.5+
	@Bramki_zdobyte*1+
	@Bramki_stracone*(-1)+
	@Win_or_loss*10+
	@Faule*(-0.3)+
	@Żółte_kartki*(-2)+
	@Czerwoni_kartki*(-5)+
	@Rzuty_wolne*0.3+
	@Rzuty_rożne*0.2+
	@Rzuty_karne*0.7

	INSERT INTO dbo.Ocena_zespołu_w_meczu VALUES(
	@team_ID,
	@mecz_ID,
	@Posiadanie_piłki,
	@Podania_celne,
	@Strzały,
	@Strzały_celne,
	@Bramki_zdobyte,
	@Bramki_stracone,
	@Win_or_loss,
	@Faule,
	@Żółte_kartki,
	@Czerwoni_kartki,
	@Rzuty_wolne,
	@Rzuty_rożne,
	@Rzuty_karne,
	@Ocena
	)
END;	
GO

GO
CREATE PROCEDURE dbo.CALCULATE_TEAM_SEASON_RATING  @team_id INT, @sezon_id INT
AS
BEGIN
	declare @Ocena float
	SET @Ocena = select AVG(ocena_w_meczu) from dbo.Ocena_zespołu_w_meczu group by team.id having team.id = @team_id

	IF EXISTS (SELECT * FROM dbo.Ocena_zawodnika_w_sezonie WHERE zawodnik_id = @zawodnik_id and sezon_id = @sezon_id) 
	BEGIN
		UPDATE dbo.Ocena_zespołu_w_sezonie
		SET ocena_w_sezonie = @Ocena
		WHERE team_id = @team_id and sezon_id = @sezon_id
	END
	ELSE
	BEGIN
		INSERT INTO dbo.Ocena_zawodnika_w_sezonie VALUES(
		@team_ID,
		@sezon_ID,
		@Ocena
		)
	END
END;
GO

GO
CREATE PROCEDURE dbo.CREATE_TOTY @sezon_id INT,@bramkarz INT,@lewy_obronca INT,@prawy_obronca INT,@srodkowy_obronca INT,
	@lewy_pomocnik INT,@prawy_pomocnik INT,@srodkowy_pomocnik INT,
	@lewy_napastnik INT,@prawy_napastnik INT,@srodkowy_napastnik INT
AS
BEGIN

	IF EXISTS (SELECT * FROM dbo.TOTY WHERE sezon_id = @sezon_id) 
	BEGIN
		UPDATE dbo.TOTY
		SET sezon_ID = @sezon_id, BK = @bramkarz, LO = @lewy_obronca, PO = @prawy_obronca, SO = @srodkowy_obronca,
			LP = @lewy_pomocnik, PP = @prawy_pomocnik, SP = @srodkowy_pomocnik,
			LN = @lewy_napastnik, PN = @prawy_napastnik, SN = @srodkowy_napastnik
		WHERE sezon_ID = @sezon_ID
	END
	ELSE
	BEGIN
		INSERT INTO dbo.Ocena_zawodnika_w_sezonie VALUES(
		@sezon_id,@bramkarz,@lewy_obronca,@prawy_obronca,@srodkowy_obronca,
	@lewy_pomocnik,@prawy_pomocnik,@srodkowy_pomocnik,
	@lewy_napastnik,@prawy_napastnik,@srodkowy_napastnik
		)
	END

END;
GO