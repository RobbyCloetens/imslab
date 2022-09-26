<?php
class Persoon
{
    public $naam;
    public $voornaam;
    public $studenten_nr;
    public $rmail;


    function set_name($naam, $voornaam)
    {
        $this->naam = $naam;
        $this->voornaam = $voornaam;
    }
    function set_studenten_nr($studenten_nr)
    {
        $this->studentennummer = $studenten_nr;
    }
    function set_rmail($rmail)
    {
        $this->rmail = $rmail;
    }

    function get_name()
    {
        return $this->naam;
        return $this->voornaam;
    }
    function get_studenten_nr()
    {
        return $this->studenten_nr;
    }
    function get_rmail()
    {
        return $this->rmail;
    }
}

class onderwerp
{
    public $vaknaam;
    public $vak_nr;

    function set_vaknaam($vaknaam)
    {
        $this->vaknaam = $vaknaam;
    }
    function set_vak_nr($vak_nr)
    {
        $this->vak_nr = $vak_nr;
    }
    function get_vaknaam()
    {
        return $this->vaknaam;
    }
    function get_vak_nr()
    {
        return $this->vak_nr;
    }
}

class vraag
{
    public $vraag_nr;
    public $vraag;
    public $studenten_nr;
    public $vak_nr;

    function set_vraag_nr($vraag_nr)
    {
        $this->vraag_nr = $vraag_nr;
    }
    function set_vraag($vraag)
    {
        $this->vraag = $vraag;
    }
    function set_studenten_nr($studenten_nr)
    {
        $this->studentennummer = $studenten_nr;
    }
    function set_vak_nr($vak_nr)
    {
        $this->vak_nr = $vak_nr;
    }
    function get_vraag_nr()
    {
        return $this->vraag_nr;
    }
    function get_vraag()
    {
        return $this->vraag;
    }
    function get_studenten_nr()
    {
        return $this->studenten_nr;
    }
    function get_vak_nr()
    {
        return $this->vak_nr;
    }
}

class antwoord
{
    public $antwoord_nr;
    public $antwoord;
    public $studenten_nr;
    public $vraag_nr;

    function set_antwoord_nr($antwoord_nr)
    {
        $this->antwoord_nr = $antwoord_nr;
    }
    function set_antwoord($antwoord)
    {
        $this->antwoord = $antwoord;
    }
    function set_studenten_nr($studenten_nr)
    {
        $this->studentennummer = $studenten_nr;
    }
    function set_vak_nr($vraag_nr)
    {
        $this->vraag_nr = $vraag_nr;
    }
    function get_antwoord_nr()
    {
        return $this->antwoord_nr;
    }
    function get_antwoord()
    {
        return $this->antwoord;
    }
    function get_studenten_nr()
    {
        return $this->studenten_nr;
    }
    function get_vraag_nr()
    {
        return $this->vraag_nr;
    }
}
