<?php
// Secure HTML Input
function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

// Include Scripts From Root Path
function includeScript($path) {
	return include $_SERVER['DOCUMENT_ROOT'] . "/thefuture/apac/{$path}";
}

// Path To Root Directory
function root($path) {
	return $_SERVER['DOCUMENT_ROOT'] . "/thefuture/apac/{$path}";
}

// absulot path used in links
function linkto($path) {
	echo "/thefuture/apac/{$path}"; //Local
    //  echo "/{$path}"; //Live
}

//Print Success Message Style
function Success ($message) {
	echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			<span aria-hidden=\"true\">&times;</span>
			</button>
			{$message}
		</div>" ;
}

//Print Error Message Style
function Danger($message) {
	echo "<div class=\"alert alert-danger alert-dismissible show fade in\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			<span aria-hidden=\"true\">&times;</span>
			</button>
			{$message}
		</div>" ;
}

function firstUC($character){
	return ucfirst($character);
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function dateDiff($date1, $date2) {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return floor($diff / (60 * 60 * 24));
}

function utc_time($time, $timezone) {
    date_default_timezone_set($timezone);
    $datetime = $time;
    $africa_timestamp = strtotime($datetime);
    // echo date_default_timezone_get()."<br>"; // Africa/Kigali
    date_default_timezone_set('UTC');
    // echo date_default_timezone_get()."<br>"; //UTC
    $utcDateTime = date("H:i A", $africa_timestamp);
    return ($utcDateTime);
}

function country_to_continent($country){
    $continent = '';
    if( $country == 'AF' ) $continent = 'Asia';
    if( $country == 'AX' ) $continent = 'Europe';
    if( $country == 'AL' ) $continent = 'Europe';
    if( $country == 'DZ' ) $continent = 'Africa';
    if( $country == 'AS' ) $continent = 'Oceania';
    if( $country == 'AD' ) $continent = 'Europe';
    if( $country == 'AO' ) $continent = 'Africa';
    if( $country == 'AI' ) $continent = 'North America';
    if( $country == 'AQ' ) $continent = 'Antarctica';
    if( $country == 'AG' ) $continent = 'North America';
    if( $country == 'AR' ) $continent = 'South America';
    if( $country == 'AM' ) $continent = 'Asia';
    if( $country == 'AW' ) $continent = 'North America';
    if( $country == 'AU' ) $continent = 'Oceania';
    if( $country == 'AT' ) $continent = 'Europe';
    if( $country == 'AZ' ) $continent = 'Asia';
    if( $country == 'BS' ) $continent = 'North America';
    if( $country == 'BH' ) $continent = 'Asia';
    if( $country == 'BD' ) $continent = 'Asia';
    if( $country == 'BB' ) $continent = 'North America';
    if( $country == 'BY' ) $continent = 'Europe';
    if( $country == 'BE' ) $continent = 'Europe';
    if( $country == 'BZ' ) $continent = 'North America';
    if( $country == 'BJ' ) $continent = 'Africa';
    if( $country == 'BM' ) $continent = 'North America';
    if( $country == 'BT' ) $continent = 'Asia';
    if( $country == 'BO' ) $continent = 'South America';
    if( $country == 'BA' ) $continent = 'Europe';
    if( $country == 'BW' ) $continent = 'Africa';
    if( $country == 'BV' ) $continent = 'Antarctica';
    if( $country == 'BR' ) $continent = 'South America';
    if( $country == 'IO' ) $continent = 'Asia';
    if( $country == 'VG' ) $continent = 'North America';
    if( $country == 'BN' ) $continent = 'Asia';
    if( $country == 'BG' ) $continent = 'Europe';
    if( $country == 'BF' ) $continent = 'Africa';
    if( $country == 'BI' ) $continent = 'Africa';
    if( $country == 'KH' ) $continent = 'Asia';
    if( $country == 'CM' ) $continent = 'Africa';
    if( $country == 'CA' ) $continent = 'North America';
    if( $country == 'CV' ) $continent = 'Africa';
    if( $country == 'KY' ) $continent = 'North America';
    if( $country == 'CF' ) $continent = 'Africa';
    if( $country == 'TD' ) $continent = 'Africa';
    if( $country == 'CL' ) $continent = 'South America';
    if( $country == 'CN' ) $continent = 'Asia';
    if( $country == 'CX' ) $continent = 'Asia';
    if( $country == 'CC' ) $continent = 'Asia';
    if( $country == 'CO' ) $continent = 'South America';
    if( $country == 'KM' ) $continent = 'Africa';
    if( $country == 'CD' ) $continent = 'Africa';
    if( $country == 'CG' ) $continent = 'Africa';
    if( $country == 'CK' ) $continent = 'Oceania';
    if( $country == 'CR' ) $continent = 'North America';
    if( $country == 'CI' ) $continent = 'Africa';
    if( $country == 'HR' ) $continent = 'Europe';
    if( $country == 'CU' ) $continent = 'North America';
    if( $country == 'CY' ) $continent = 'Asia';
    if( $country == 'CZ' ) $continent = 'Europe';
    if( $country == 'DK' ) $continent = 'Europe';
    if( $country == 'DJ' ) $continent = 'Africa';
    if( $country == 'DM' ) $continent = 'North America';
    if( $country == 'DO' ) $continent = 'North America';
    if( $country == 'EC' ) $continent = 'South America';
    if( $country == 'EG' ) $continent = 'Africa';
    if( $country == 'SV' ) $continent = 'North America';
    if( $country == 'GQ' ) $continent = 'Africa';
    if( $country == 'ER' ) $continent = 'Africa';
    if( $country == 'EE' ) $continent = 'Europe';
    if( $country == 'ET' ) $continent = 'Africa';
    if( $country == 'FO' ) $continent = 'Europe';
    if( $country == 'FK' ) $continent = 'South America';
    if( $country == 'FJ' ) $continent = 'Oceania';
    if( $country == 'FI' ) $continent = 'Europe';
    if( $country == 'FR' ) $continent = 'Europe';
    if( $country == 'GF' ) $continent = 'South America';
    if( $country == 'PF' ) $continent = 'Oceania';
    if( $country == 'TF' ) $continent = 'Antarctica';
    if( $country == 'GA' ) $continent = 'Africa';
    if( $country == 'GM' ) $continent = 'Africa';
    if( $country == 'GE' ) $continent = 'Asia';
    if( $country == 'DE' ) $continent = 'Europe';
    if( $country == 'GH' ) $continent = 'Africa';
    if( $country == 'GI' ) $continent = 'Europe';
    if( $country == 'GR' ) $continent = 'Europe';
    if( $country == 'GL' ) $continent = 'North America';
    if( $country == 'GD' ) $continent = 'North America';
    if( $country == 'GP' ) $continent = 'North America';
    if( $country == 'GU' ) $continent = 'Oceania';
    if( $country == 'GT' ) $continent = 'North America';
    if( $country == 'GG' ) $continent = 'Europe';
    if( $country == 'GN' ) $continent = 'Africa';
    if( $country == 'GW' ) $continent = 'Africa';
    if( $country == 'GY' ) $continent = 'South America';
    if( $country == 'HT' ) $continent = 'North America';
    if( $country == 'HM' ) $continent = 'Antarctica';
    if( $country == 'VA' ) $continent = 'Europe';
    if( $country == 'HN' ) $continent = 'North America';
    if( $country == 'HK' ) $continent = 'Asia';
    if( $country == 'HU' ) $continent = 'Europe';
    if( $country == 'IS' ) $continent = 'Europe';
    if( $country == 'IN' ) $continent = 'Asia';
    if( $country == 'ID' ) $continent = 'Asia';
    if( $country == 'IR' ) $continent = 'Asia';
    if( $country == 'IQ' ) $continent = 'Asia';
    if( $country == 'IE' ) $continent = 'Europe';
    if( $country == 'IM' ) $continent = 'Europe';
    if( $country == 'IL' ) $continent = 'Asia';
    if( $country == 'IT' ) $continent = 'Europe';
    if( $country == 'JM' ) $continent = 'North America';
    if( $country == 'JP' ) $continent = 'Asia';
    if( $country == 'JE' ) $continent = 'Europe';
    if( $country == 'JO' ) $continent = 'Asia';
    if( $country == 'KZ' ) $continent = 'Asia';
    if( $country == 'KE' ) $continent = 'Africa';
    if( $country == 'KI' ) $continent = 'Oceania';
    if( $country == 'KP' ) $continent = 'Asia';
    if( $country == 'KR' ) $continent = 'Asia';
    if( $country == 'KW' ) $continent = 'Asia';
    if( $country == 'KG' ) $continent = 'Asia';
    if( $country == 'LA' ) $continent = 'Asia';
    if( $country == 'LV' ) $continent = 'Europe';
    if( $country == 'LB' ) $continent = 'Asia';
    if( $country == 'LS' ) $continent = 'Africa';
    if( $country == 'LR' ) $continent = 'Africa';
    if( $country == 'LY' ) $continent = 'Africa';
    if( $country == 'LI' ) $continent = 'Europe';
    if( $country == 'LT' ) $continent = 'Europe';
    if( $country == 'LU' ) $continent = 'Europe';
    if( $country == 'MO' ) $continent = 'Asia';
    if( $country == 'MK' ) $continent = 'Europe';
    if( $country == 'MG' ) $continent = 'Africa';
    if( $country == 'MW' ) $continent = 'Africa';
    if( $country == 'MY' ) $continent = 'Asia';
    if( $country == 'MV' ) $continent = 'Asia';
    if( $country == 'ML' ) $continent = 'Africa';
    if( $country == 'MT' ) $continent = 'Europe';
    if( $country == 'MH' ) $continent = 'Oceania';
    if( $country == 'MQ' ) $continent = 'North America';
    if( $country == 'MR' ) $continent = 'Africa';
    if( $country == 'MU' ) $continent = 'Africa';
    if( $country == 'YT' ) $continent = 'Africa';
    if( $country == 'MX' ) $continent = 'North America';
    if( $country == 'FM' ) $continent = 'Oceania';
    if( $country == 'MD' ) $continent = 'Europe';
    if( $country == 'MC' ) $continent = 'Europe';
    if( $country == 'MN' ) $continent = 'Asia';
    if( $country == 'ME' ) $continent = 'Europe';
    if( $country == 'MS' ) $continent = 'North America';
    if( $country == 'MA' ) $continent = 'Africa';
    if( $country == 'MZ' ) $continent = 'Africa';
    if( $country == 'MM' ) $continent = 'Asia';
    if( $country == 'NA' ) $continent = 'Africa';
    if( $country == 'NR' ) $continent = 'Oceania';
    if( $country == 'NP' ) $continent = 'Asia';
    if( $country == 'AN' ) $continent = 'North America';
    if( $country == 'NL' ) $continent = 'Europe';
    if( $country == 'NC' ) $continent = 'Oceania';
    if( $country == 'NZ' ) $continent = 'Oceania';
    if( $country == 'NI' ) $continent = 'North America';
    if( $country == 'NE' ) $continent = 'Africa';
    if( $country == 'NG' ) $continent = 'Africa';
    if( $country == 'NU' ) $continent = 'Oceania';
    if( $country == 'NF' ) $continent = 'Oceania';
    if( $country == 'MP' ) $continent = 'Oceania';
    if( $country == 'NO' ) $continent = 'Europe';
    if( $country == 'OM' ) $continent = 'Asia';
    if( $country == 'PK' ) $continent = 'Asia';
    if( $country == 'PW' ) $continent = 'Oceania';
    if( $country == 'PS' ) $continent = 'Asia';
    if( $country == 'PA' ) $continent = 'North America';
    if( $country == 'PG' ) $continent = 'Oceania';
    if( $country == 'PY' ) $continent = 'South America';
    if( $country == 'PE' ) $continent = 'South America';
    if( $country == 'PH' ) $continent = 'Asia';
    if( $country == 'PN' ) $continent = 'Oceania';
    if( $country == 'PL' ) $continent = 'Europe';
    if( $country == 'PT' ) $continent = 'Europe';
    if( $country == 'PR' ) $continent = 'North America';
    if( $country == 'QA' ) $continent = 'Asia';
    if( $country == 'RE' ) $continent = 'Africa';
    if( $country == 'RO' ) $continent = 'Europe';
    if( $country == 'RU' ) $continent = 'Europe';
    if( $country == 'RW' ) $continent = 'Africa';
    if( $country == 'BL' ) $continent = 'North America';
    if( $country == 'SH' ) $continent = 'Africa';
    if( $country == 'KN' ) $continent = 'North America';
    if( $country == 'LC' ) $continent = 'North America';
    if( $country == 'MF' ) $continent = 'North America';
    if( $country == 'PM' ) $continent = 'North America';
    if( $country == 'VC' ) $continent = 'North America';
    if( $country == 'WS' ) $continent = 'Oceania';
    if( $country == 'SM' ) $continent = 'Europe';
    if( $country == 'ST' ) $continent = 'Africa';
    if( $country == 'SA' ) $continent = 'Asia';
    if( $country == 'SN' ) $continent = 'Africa';
    if( $country == 'RS' ) $continent = 'Europe';
    if( $country == 'SC' ) $continent = 'Africa';
    if( $country == 'SL' ) $continent = 'Africa';
    if( $country == 'SG' ) $continent = 'Asia';
    if( $country == 'SK' ) $continent = 'Europe';
    if( $country == 'SI' ) $continent = 'Europe';
    if( $country == 'SB' ) $continent = 'Oceania';
    if( $country == 'SO' ) $continent = 'Africa';
    if( $country == 'ZA' ) $continent = 'Africa';
    if( $country == 'GS' ) $continent = 'Antarctica';
    if( $country == 'ES' ) $continent = 'Europe';
    if( $country == 'LK' ) $continent = 'Asia';
    if( $country == 'SD' ) $continent = 'Africa';
    if( $country == 'SR' ) $continent = 'South America';
    if( $country == 'SJ' ) $continent = 'Europe';
    if( $country == 'SZ' ) $continent = 'Africa';
    if( $country == 'SE' ) $continent = 'Europe';
    if( $country == 'CH' ) $continent = 'Europe';
    if( $country == 'SY' ) $continent = 'Asia';
    if( $country == 'TW' ) $continent = 'Asia';
    if( $country == 'TJ' ) $continent = 'Asia';
    if( $country == 'TZ' ) $continent = 'Africa';
    if( $country == 'TH' ) $continent = 'Asia';
    if( $country == 'TL' ) $continent = 'Asia';
    if( $country == 'TG' ) $continent = 'Africa';
    if( $country == 'TK' ) $continent = 'Oceania';
    if( $country == 'TO' ) $continent = 'Oceania';
    if( $country == 'TT' ) $continent = 'North America';
    if( $country == 'TN' ) $continent = 'Africa';
    if( $country == 'TR' ) $continent = 'Asia';
    if( $country == 'TM' ) $continent = 'Asia';
    if( $country == 'TC' ) $continent = 'North America';
    if( $country == 'TV' ) $continent = 'Oceania';
    if( $country == 'UG' ) $continent = 'Africa';
    if( $country == 'UA' ) $continent = 'Europe';
    if( $country == 'AE' ) $continent = 'Asia';
    if( $country == 'GB' ) $continent = 'Europe';
    if( $country == 'US' ) $continent = 'North America';
    if( $country == 'UM' ) $continent = 'Oceania';
    if( $country == 'VI' ) $continent = 'North America';
    if( $country == 'UY' ) $continent = 'South America';
    if( $country == 'UZ' ) $continent = 'Asia';
    if( $country == 'VU' ) $continent = 'Oceania';
    if( $country == 'VE' ) $continent = 'South America';
    if( $country == 'VN' ) $continent = 'Asia';
    if( $country == 'WF' ) $continent = 'Oceania';
    if( $country == 'EH' ) $continent = 'Africa';
    if( $country == 'YE' ) $continent = 'Asia';
    if( $country == 'ZM' ) $continent = 'Africa';
    if( $country == 'ZW' ) $continent = 'Africa';
    return $continent;
}

function dateFormat($date) {
    $convert = DateTime::createFromFormat('d/m/Y', $date);
    return ($convert->format('Y-m-d'));
}

function countryCodeToCountry($code) {
    $code = strtoupper($code);
    if ($code == 'AF') return 'Afghanistan';
    if ($code == 'AX') return 'Aland Islands';
    if ($code == 'AL') return 'Albania';
    if ($code == 'DZ') return 'Algeria';
    if ($code == 'AS') return 'American Samoa';
    if ($code == 'AD') return 'Andorra';
    if ($code == 'AO') return 'Angola';
    if ($code == 'AI') return 'Anguilla';
    if ($code == 'AQ') return 'Antarctica';
    if ($code == 'AG') return 'Antigua and Barbuda';
    if ($code == 'AR') return 'Argentina';
    if ($code == 'AM') return 'Armenia';
    if ($code == 'AW') return 'Aruba';
    if ($code == 'AU') return 'Australia';
    if ($code == 'AT') return 'Austria';
    if ($code == 'AZ') return 'Azerbaijan';
    if ($code == 'BS') return 'Bahamas the';
    if ($code == 'BH') return 'Bahrain';
    if ($code == 'BD') return 'Bangladesh';
    if ($code == 'BB') return 'Barbados';
    if ($code == 'BY') return 'Belarus';
    if ($code == 'BE') return 'Belgium';
    if ($code == 'BZ') return 'Belize';
    if ($code == 'BJ') return 'Benin';
    if ($code == 'BM') return 'Bermuda';
    if ($code == 'BT') return 'Bhutan';
    if ($code == 'BO') return 'Bolivia';
    if ($code == 'BA') return 'Bosnia and Herzegovina';
    if ($code == 'BW') return 'Botswana';
    if ($code == 'BV') return 'Bouvet Island (Bouvetoya)';
    if ($code == 'BR') return 'Brazil';
    if ($code == 'IO') return 'British Indian Ocean Territory (Chagos Archipelago)';
    if ($code == 'VG') return 'British Virgin Islands';
    if ($code == 'BN') return 'Brunei Darussalam';
    if ($code == 'BG') return 'Bulgaria';
    if ($code == 'BF') return 'Burkina Faso';
    if ($code == 'BI') return 'Burundi';
    if ($code == 'KH') return 'Cambodia';
    if ($code == 'CM') return 'Cameroon';
    if ($code == 'CA') return 'Canada';
    if ($code == 'CV') return 'Cape Verde';
    if ($code == 'KY') return 'Cayman Islands';
    if ($code == 'CF') return 'Central African Republic';
    if ($code == 'TD') return 'Chad';
    if ($code == 'CL') return 'Chile';
    if ($code == 'CN') return 'China';
    if ($code == 'CX') return 'Christmas Island';
    if ($code == 'CC') return 'Cocos (Keeling) Islands';
    if ($code == 'CO') return 'Colombia';
    if ($code == 'KM') return 'Comoros the';
    if ($code == 'CD') return 'Congo';
    if ($code == 'CG') return 'Congo the';
    if ($code == 'CK') return 'Cook Islands';
    if ($code == 'CR') return 'Costa Rica';
    if ($code == 'CI') return 'Cote d\'Ivoire';
    if ($code == 'HR') return 'Croatia';
    if ($code == 'CU') return 'Cuba';
    if ($code == 'CY') return 'Cyprus';
    if ($code == 'CZ') return 'Czech Republic';
    if ($code == 'DK') return 'Denmark';
    if ($code == 'DJ') return 'Djibouti';
    if ($code == 'DM') return 'Dominica';
    if ($code == 'DO') return 'Dominican Republic';
    if ($code == 'EC') return 'Ecuador';
    if ($code == 'EG') return 'Egypt';
    if ($code == 'SV') return 'El Salvador';
    if ($code == 'GQ') return 'Equatorial Guinea';
    if ($code == 'ER') return 'Eritrea';
    if ($code == 'EE') return 'Estonia';
    if ($code == 'ET') return 'Ethiopia';
    if ($code == 'FO') return 'Faroe Islands';
    if ($code == 'FK') return 'Falkland Islands (Malvinas)';
    if ($code == 'FJ') return 'Fiji the Fiji Islands';
    if ($code == 'FI') return 'Finland';
    if ($code == 'FR') return 'France';
    if ($code == 'GF') return 'French Guiana';
    if ($code == 'PF') return 'French Polynesia';
    if ($code == 'TF') return 'French Southern Territories';
    if ($code == 'GA') return 'Gabon';
    if ($code == 'GM') return 'Gambia the';
    if ($code == 'GE') return 'Georgia';
    if ($code == 'DE') return 'Germany';
    if ($code == 'GH') return 'Ghana';
    if ($code == 'GI') return 'Gibraltar';
    if ($code == 'GR') return 'Greece';
    if ($code == 'GL') return 'Greenland';
    if ($code == 'GD') return 'Grenada';
    if ($code == 'GP') return 'Guadeloupe';
    if ($code == 'GU') return 'Guam';
    if ($code == 'GT') return 'Guatemala';
    if ($code == 'GG') return 'Guernsey';
    if ($code == 'GN') return 'Guinea';
    if ($code == 'GW') return 'Guinea-Bissau';
    if ($code == 'GY') return 'Guyana';
    if ($code == 'HT') return 'Haiti';
    if ($code == 'HM') return 'Heard Island and McDonald Islands';
    if ($code == 'VA') return 'Holy See (Vatican City State)';
    if ($code == 'HN') return 'Honduras';
    if ($code == 'HK') return 'Hong Kong';
    if ($code == 'HU') return 'Hungary';
    if ($code == 'IS') return 'Iceland';
    if ($code == 'IN') return 'India';
    if ($code == 'ID') return 'Indonesia';
    if ($code == 'IR') return 'Iran';
    if ($code == 'IQ') return 'Iraq';
    if ($code == 'IE') return 'Ireland';
    if ($code == 'IM') return 'Isle of Man';
    if ($code == 'IL') return 'Israel';
    if ($code == 'IT') return 'Italy';
    if ($code == 'JM') return 'Jamaica';
    if ($code == 'JP') return 'Japan';
    if ($code == 'JE') return 'Jersey';
    if ($code == 'JO') return 'Jordan';
    if ($code == 'KZ') return 'Kazakhstan';
    if ($code == 'KE') return 'Kenya';
    if ($code == 'KI') return 'Kiribati';
    if ($code == 'KP') return 'Korea';
    if ($code == 'KR') return 'Korea';
    if ($code == 'KW') return 'Kuwait';
    if ($code == 'KG') return 'Kyrgyz Republic';
    if ($code == 'LA') return 'Lao';
    if ($code == 'LV') return 'Latvia';
    if ($code == 'LB') return 'Lebanon';
    if ($code == 'LS') return 'Lesotho';
    if ($code == 'LR') return 'Liberia';
    if ($code == 'LY') return 'Libyan Arab Jamahiriya';
    if ($code == 'LI') return 'Liechtenstein';
    if ($code == 'LT') return 'Lithuania';
    if ($code == 'LU') return 'Luxembourg';
    if ($code == 'MO') return 'Macao';
    if ($code == 'MK') return 'Macedonia';
    if ($code == 'MG') return 'Madagascar';
    if ($code == 'MW') return 'Malawi';
    if ($code == 'MY') return 'Malaysia';
    if ($code == 'MV') return 'Maldives';
    if ($code == 'ML') return 'Mali';
    if ($code == 'MT') return 'Malta';
    if ($code == 'MH') return 'Marshall Islands';
    if ($code == 'MQ') return 'Martinique';
    if ($code == 'MR') return 'Mauritania';
    if ($code == 'MU') return 'Mauritius';
    if ($code == 'YT') return 'Mayotte';
    if ($code == 'MX') return 'Mexico';
    if ($code == 'FM') return 'Micronesia';
    if ($code == 'MD') return 'Moldova';
    if ($code == 'MC') return 'Monaco';
    if ($code == 'MN') return 'Mongolia';
    if ($code == 'ME') return 'Montenegro';
    if ($code == 'MS') return 'Montserrat';
    if ($code == 'MA') return 'Morocco';
    if ($code == 'MZ') return 'Mozambique';
    if ($code == 'MM') return 'Myanmar';
    if ($code == 'NA') return 'Namibia';
    if ($code == 'NR') return 'Nauru';
    if ($code == 'NP') return 'Nepal';
    if ($code == 'AN') return 'Netherlands Antilles';
    if ($code == 'NL') return 'Netherlands the';
    if ($code == 'NC') return 'New Caledonia';
    if ($code == 'NZ') return 'New Zealand';
    if ($code == 'NI') return 'Nicaragua';
    if ($code == 'NE') return 'Niger';
    if ($code == 'NG') return 'Nigeria';
    if ($code == 'NU') return 'Niue';
    if ($code == 'NF') return 'Norfolk Island';
    if ($code == 'MP') return 'Northern Mariana Islands';
    if ($code == 'NO') return 'Norway';
    if ($code == 'OM') return 'Oman';
    if ($code == 'PK') return 'Pakistan';
    if ($code == 'PW') return 'Palau';
    if ($code == 'PS') return 'Palestinian Territory';
    if ($code == 'PA') return 'Panama';
    if ($code == 'PG') return 'Papua New Guinea';
    if ($code == 'PY') return 'Paraguay';
    if ($code == 'PE') return 'Peru';
    if ($code == 'PH') return 'Philippines';
    if ($code == 'PN') return 'Pitcairn Islands';
    if ($code == 'PL') return 'Poland';
    if ($code == 'PT') return 'Portugal, Portuguese Republic';
    if ($code == 'PR') return 'Puerto Rico';
    if ($code == 'QA') return 'Qatar';
    if ($code == 'RE') return 'Reunion';
    if ($code == 'RO') return 'Romania';
    if ($code == 'RU') return 'Russian Federation';
    if ($code == 'RW') return 'Rwanda';
    if ($code == 'BL') return 'Saint Barthelemy';
    if ($code == 'SH') return 'Saint Helena';
    if ($code == 'KN') return 'Saint Kitts and Nevis';
    if ($code == 'LC') return 'Saint Lucia';
    if ($code == 'MF') return 'Saint Martin';
    if ($code == 'PM') return 'Saint Pierre and Miquelon';
    if ($code == 'VC') return 'Saint Vincent and the Grenadines';
    if ($code == 'WS') return 'Samoa';
    if ($code == 'SM') return 'San Marino';
    if ($code == 'ST') return 'Sao Tome and Principe';
    if ($code == 'SA') return 'Saudi Arabia';
    if ($code == 'SN') return 'Senegal';
    if ($code == 'RS') return 'Serbia';
    if ($code == 'SC') return 'Seychelles';
    if ($code == 'SL') return 'Sierra Leone';
    if ($code == 'SG') return 'Singapore';
    if ($code == 'SK') return 'Slovakia (Slovak Republic)';
    if ($code == 'SI') return 'Slovenia';
    if ($code == 'SB') return 'Solomon Islands';
    if ($code == 'SO') return 'Somalia, Somali Republic';
    if ($code == 'ZA') return 'South Africa';
    if ($code == 'GS') return 'South Georgia and the South Sandwich Islands';
    if ($code == 'ES') return 'Spain';
    if ($code == 'LK') return 'Sri Lanka';
    if ($code == 'SD') return 'Sudan';
    if ($code == 'SR') return 'Suriname';
    if ($code == 'SJ') return 'Svalbard & Jan Mayen Islands';
    if ($code == 'SZ') return 'Swaziland';
    if ($code == 'SE') return 'Sweden';
    if ($code == 'CH') return 'Switzerland, Swiss Confederation';
    if ($code == 'SY') return 'Syrian Arab Republic';
    if ($code == 'TW') return 'Taiwan';
    if ($code == 'TJ') return 'Tajikistan';
    if ($code == 'TZ') return 'Tanzania';
    if ($code == 'TH') return 'Thailand';
    if ($code == 'TL') return 'Timor-Leste';
    if ($code == 'TG') return 'Togo';
    if ($code == 'TK') return 'Tokelau';
    if ($code == 'TO') return 'Tonga';
    if ($code == 'TT') return 'Trinidad and Tobago';
    if ($code == 'TN') return 'Tunisia';
    if ($code == 'TR') return 'Turkey';
    if ($code == 'TM') return 'Turkmenistan';
    if ($code == 'TC') return 'Turks and Caicos Islands';
    if ($code == 'TV') return 'Tuvalu';
    if ($code == 'UG') return 'Uganda';
    if ($code == 'UA') return 'Ukraine';
    if ($code == 'AE') return 'United Arab Emirates';
    if ($code == 'GB') return 'United Kingdom';
    if ($code == 'US') return 'United States of America';
    if ($code == 'UM') return 'United States Minor Outlying Islands';
    if ($code == 'VI') return 'United States Virgin Islands';
    if ($code == 'UY') return 'Uruguay, Eastern Republic of';
    if ($code == 'UZ') return 'Uzbekistan';
    if ($code == 'VU') return 'Vanuatu';
    if ($code == 'VE') return 'Venezuela';
    if ($code == 'VN') return 'Vietnam';
    if ($code == 'WF') return 'Wallis and Futuna';
    if ($code == 'EH') return 'Western Sahara';
    if ($code == 'YE') return 'Yemen';
    if ($code == 'XK') return 'Kosovo';
    if ($code == 'ZM') return 'Zambia';
    if ($code == 'ZW') return 'Zimbabwe';
    return 'Unknown Country';
}

function html_cut($text, $max_length)
{
    $tags   = array();
    $result = "";

    $is_open   = false;
    $grab_open = false;
    $is_close  = false;
    $in_double_quotes = false;
    $in_single_quotes = false;
    $tag = "";

    $i = 0;
    $stripped = 0;

    $stripped_text = strip_tags($text);

    // while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
    // {
    //     $symbol  = $text{$i};
    //     $result .= $symbol;

    //     switch ($symbol)
    //     {
    //        case '<':
    //             $is_open   = true;
    //             $grab_open = true;
    //             break;
    //        case '"':
    //            if ($in_double_quotes)
    //                $in_double_quotes = false;
    //            else
    //                $in_double_quotes = true;
    //             break;

    //         case "'":
    //           if ($in_single_quotes)
    //               $in_single_quotes = false;
    //           else
    //               $in_single_quotes = true;
    //             break;
    //         case '/':
    //             if ($is_open && !$in_double_quotes && !$in_single_quotes)
    //             {
    //                 $is_close  = true;
    //                 $is_open   = false;
    //                 $grab_open = false;
    //             }
    //             break;
    //         case ' ':
    //             if ($is_open)
    //                 $grab_open = false;
    //             else
    //                 $stripped++;
    //             break;
    //         case '>':
    //             if ($is_open)
    //             {
    //                 $is_open   = false;
    //                 $grab_open = false;
    //                 array_push($tags, $tag);
    //                 $tag = "";
    //             }
    //             else if ($is_close)
    //             {
    //                 $is_close = false;
    //                 array_pop($tags);
    //                 $tag = "";
    //             }
    //             break;
    //         default:
    //             if ($grab_open || $is_close)
    //                 $tag .= $symbol;

    //             if (!$is_open && !$is_close)
    //                 $stripped++;
    //     }

    //     $i++;
    // }

    while ($tags)
        $result .= "</".array_pop($tags).">";

    return $result;
}    

$INC_DIR = $_SERVER['DOCUMENT_ROOT'] . "/thefuture/apac/admin/includes/"; //Local
//  $INC_DIR = $_SERVER['DOCUMENT_ROOT'] . "/admin/includes/"; //Live