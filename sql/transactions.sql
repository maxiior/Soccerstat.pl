SET TRANSACTION ISOLATION LEVEL READ UNCOMITTED
BEGIN PLAYER_RATING_IN_MATCH

	EXECUTE CALCULATE_PLAYER_RATING(1,2,3,4,5,6,7,8,9,10);
	EXECUTE CALCULATE_PLAYER_SEASON_RATING(1, 2009);

END PLAYER_RATING_IN_MATCH

SET TRANSACTION ISOLATION LEVEL READ UNCOMITTED
BEGIN TEAM_RATING_IN_MATCH

	EXECUTE CALCULATE_TEAM_RATING(1,2,3,4,5,6,7,8,9,10);
	EXECUTE CALCULATE_TEAM_SEASON_RATING(1, 2009);

END TEAM_RATING_IN_MATCH

SET TRANSACTION ISOLATION LEVEL READ COMITTED
BEGIN TOTY

	declare @bramkarz INT 
	set @bramkarz = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'GK'
	order by ocena_w_sezonie

	declare @lewy_obronca INT 
	set @lewy_obronca = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'LO' or 'CLS'
	order by ocena_w_sezonie

	declare @prawy_obronca INT 
	set @prawy_obronca = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'PO' or 'CPS'
	order by ocena_w_sezonie

	declare @srodkowy_obronca INT 
	set @srodkowy_obronca = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'SO' or 'ST' or 'SPD'
	order by ocena_w_sezonie

	declare @lewy_pomocnik INT 
	set @lewy_pomocnik = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'LP' or 'LPD' or 'LS'
	order by ocena_w_sezonie

	declare @prawy_pomocnik INT 
	set @srodkowy_obronca = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'PO' or 'PPD' or 'PS'
	order by ocena_w_sezonie

	declare @srodkowy_pomocnik INT 
	set @srodkowy_obronca = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'SP'
	order by ocena_w_sezonie

	declare @lewy_napastnik INT 
	set @lewy_napastnik = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'LN' or 'LPO'
	order by ocena_w_sezonie

	declare @prawy_napastnik INT 
	set @prawy_napastnik = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'PN' or 'PPO'
	order by ocena_w_sezonie

	declare @srodkowy_napastnik INT 
	set @srodkowy_napastnik = select top 1 zawodnik_id
	from pilkarz join Ocena_zawodnika_w_sezonie on pilkarz.id=Ocena_zawodnika_w_sezonie.zawodnik_id
	where pilkarz.position like 'N' or 'SN' or 'SPO'
	order by ocena_w_sezonie

	EXECUTE CREATE_TOTY(@sezon_id,@bramkarz,@lewy_obronca,@prawy_obronca,@srodkowy_obronca,
	@lewy_pomocnik,@prawy_pomocnik,@srodkowy_pomocnik,
	@lewy_napastnik,@prawy_napastnik,@srodkowy_napastnik)

END TOTY