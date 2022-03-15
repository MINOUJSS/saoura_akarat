<?php
/*:::::::::::::::::::::::::::::::::::::::::::::::::
                Admin functions
::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*-------------------------------------------
 |               side bar active link
 --------------------------------------------*/
 function active_dashboard_link()
{ 
    $home_url=url('/admin'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_reale_estate_link()
{ 
    $home_url=url('/admin/reale-estates'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
/**---------------------------------------
 * |           reale estate functions
 * ---------------------------------------*/
function count_homes()
{
    return 0;
}
function get_reale_estate_type($type_id)
{
  $r_e_type=App\RealeEstateType::findOrfail($type_id);
  return $r_e_type->type;
}
function get_wilaya_name_from_id($wilaya_id)
{
    $wilaya=App\Wilaya::findOrfail($wilaya_id);
    return $wilaya->ar_name;
}
function get_dayra_name_from_id($dayra_id)
{
    $dayra=App\Dayra::findOrfail($dayra_id);
    return $dayra->ar_name;
}
function get_baladia_name_from_id($baladia_id)
{
    $baladia=App\Baladia::findOrfail($baladia_id);
    return $baladia->ar_name;
}
function get_rooms_from_id($room_id)
{
    $rooms=App\Rooms::findOrfail($room_id);
    return $rooms->rooms;
}
function get_bathes_from_id($bathe_id)
{
    $bathes=App\Bathes::findOrfail($bathe_id);
    return $bathes->bathes;
}
function get_etages_from_id($etage_id)
{
    $etages=App\Etages::findOrfail($etage_id);
    return $etages->etages;
}
function get_etage_number_from_id($etage_number_id)
{
    $etage_number=App\EtageNumber::findOrfail($etage_number_id);
    return $etage_number->eatge_number;
}
function get_facads_from_id($facad_id)
{
    $facads=App\Facads::findOrfail($facad_id);
    return $facads->facads;
}
function get_furnisheds_from_id($furnished_id)
{
    $furnisheds=App\Furnisheds::findOrfail($furnished_id);
    return $furnisheds->furnisheds;
}
function get_properies_from_id($property_id)
{
    $properties=App\Property::findOrfail($property_id);
    return $properties->property;
}
function get_tronsactions_from_id($tronsaction_id)
{
    $tronsactions=App\Tronsaction::findOrfail($tronsaction_id);
    return $tronsactions->tronsaction;
}
/*:::::::::::::::::::::::::::::::::::::::::::::::::
                Site functions
::::::::::::::::::::::::::::::::::::::::::::::::::*/
//++++++++++++++head functions+++++++++++++++++++++
function get_public_folder()
{
    // dd(URL::to("/"));
  if(URL::to("/")=="http://127.0.0.1:8000")
    {
        return '';
    }else
    {
        return '/public';
    }  
}
//++++++++++++++++++body functions ++++++++++
