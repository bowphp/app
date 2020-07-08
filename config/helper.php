<?php

if (!function_exists('mix')) {
    /**
     * Get mixfile chunkhash version
     *
     * @param string $path
     * @return string
     */
    function mix($path)
    {
        $manifest = config('app.mixfile_path');

        if (! file_exists($manifest)) {
            return $path;
        }

        $content = json_decode(file_get_contents($manifest), true);
        
        $key = '/'.ltrim($path, '/');

        if (isset($content[$key])) {
            return $content[$key];
        }
        
        throw new Exception($path . " Not exists");
    }
}

if (!function_exists('public_path')) {
    /**
     * Get public directory
     *
     * @param string $path
     * @return string
     */
    function public_path($path = '')
    {
        return __DIR__.'/../public/'.ltrim($path, '/');
    }
}

if (!function_exists('frontend_path')) {
    /**
     * Get frontend directory
     *
     * @param string $path
     * @return string
     */
    function frontend_path($path = '')
    {
        return __DIR__.'/../frontend/'.ltrim($path, '/');
    }
}

if (!function_exists('storage_path')) {
    /**
     * Get storages directory
     *
     * @param string $path
     * @return string
     */
    function storage_path($path = '')
    {
        return __DIR__.'/../storage/'.ltrim($path, '/');
    }
}

if (! function_exists('base_path')) {
    /**
     * Returns the path of the root folder of the bow framework application
     *
     * @return string
     */
    function base_path($path = '')
    {
        return rtrim(rtrim(realpath(__DIR__.'/..'), '/').'/'.$path, '/');
    }
}

if (! function_exists('gen_slix')) {
    /**
     * Generate a random code.
     * Can be used to hide the name of form fields.
     *
     * @param int $len
     * @return string
     */
    function gen_slix($len = 4)
    {
        return substr(str_shuffle(uniqid()), 0, $len);
    }
}

if (!function_exists('convert_to_moment')) {
    /**
     * Convert time to moment
     *
     * @param int $time
     * @return string
     */
    function convert_to_moment($time)
    {
        if ($time < 1) {
            $second = ceil($time * 60);

            return $second.' seconde'.($second > 1 ? 's' : '');
        }

        if ($time <= 59) {
            $second = '';

            if (is_float($time)) {
                list($time, $second) = explode('.', $time);

                if ($second > 0) {
                    $second = ' '.$second.' seconde'.($second > 1 ? 's' : '');
                }
            }

            return $time.' minute'. ($time > 1 ? 's' : '').$second;
        }

        $minute = $time % 60;

        $hour = intdiv($time, 60);

        if ($minute > 0) {
            $minute = ' ' .convert_to_moment($minute);
        } else {
            $minute = '';
        }

        return $hour.' hour'.($hour > 1 ? 's' : '').$minute;
    }
}

if (! function_exists('get_country_list')) {
    /**
     * Country list
     *
     * @return array
     */
    function get_country_list()
    {
        return [
            '' => 'Country',
            'Afghanistan' => 'Afghanistan',
            'Albania' => 'Albania',
            'Algeria' => 'Algeria',
            'American Samoa' => 'American Samoa',
            'Andorra' => 'Andorra',
            'Angola' => 'Angola',
            'Anguilla' => 'Anguilla',
            'Antarctica' => 'Antarctica',
            'Antigua and Barbuda' => 'Antigua and Barbuda',
            'Argentina' => 'Argentina',
            'Armenia' => 'Armenia',
            'Aruba' => 'Aruba',
            'Australia' => 'Australia',
            'Austria' => 'Austria',
            'Azerbaijan' => 'Azerbaijan',
            'Bahamas' => 'Bahamas',
            'Bahrain' => 'Bahrain',
            'Bangladesh' => 'Bangladesh',
            'Barbados' => 'Barbados',
            'Belarus' => 'Belarus',
            'Belgium' => 'Belgium',
            'Belize' => 'Belize',
            'Benin' => 'Benin',
            'Bermuda' => 'Bermuda',
            'Bhutan' => 'Bhutan',
            'Bolivia' => 'Bolivia',
            'Bosnia and Herzegovina' => 'Bosnia and Herzegovina',
            'Botswana' => 'Botswana',
            'Bouvet Island' => 'Bouvet Island',
            'Brazil' => 'Brazil',
            'British Indian Ocean Territory' => 'British Indian Ocean Territory',
            'Brunei Darussalam' => 'Brunei Darussalam',
            'Bulgaria' => 'Bulgaria',
            'Burkina Faso' => 'Burkina Faso',
            'Burundi' => 'Burundi',
            'Cambodia' => 'Cambodia',
            'Cameroon' => 'Cameroon',
            'Canada' => 'Canada',
            'Cape Verde' => 'Cape Verde',
            'Cayman Islands' => 'Cayman Islands',
            'Central African Republic' => 'Central African Republic',
            'Chad' => 'Chad',
            'Chile' => 'Chile',
            'China' => 'China',
            'Christmas Island' => 'Christmas Island',
            'Cocos (Keeling) Islands' => 'Cocos (Keeling) Islands',
            'Colombia' => 'Colombia',
            'Comoros' => 'Comoros',
            'Congo' => 'Congo',
            'Congo, The Democratic Republic of The' => 'Congo, The Democratic Republic of The',
            'Cook Islands' => 'Cook Islands',
            'Costa Rica' => 'Costa Rica',
            'Côte D\'ivoire' => 'Côte D\'ivoire',
            'Croatia' => 'Croatia',
            'Cuba' => 'Cuba',
            'Cyprus' => 'Cyprus',
            'Czech Republic' => 'Czech Republic',
            'Denmark' => 'Denmark',
            'Djibouti' => 'Djibouti',
            'Dominica' => 'Dominica',
            'Dominican Republic' => 'Dominican Republic',
            'Ecuador' => 'Ecuador',
            'Egypt' => 'Egypt',
            'El Salvador' => 'El Salvador',
            'Equatorial Guinea' => 'Equatorial Guinea',
            'Eritrea' => 'Eritrea',
            'Estonia' => 'Estonia',
            'Ethiopia' => 'Ethiopia',
            'Falkland Islands (Malvinas)' => 'Falkland Islands (Malvinas)',
            'Faroe Islands' => 'Faroe Islands',
            'Fiji' => 'Fiji',
            'Finland' => 'Finland',
            'France' => 'France',
            'French Guiana' => 'French Guiana',
            'French Polynesia' => 'French Polynesia',
            'French Southern Territories' => 'French Southern Territories',
            'Gabon' => 'Gabon',
            'Gambia' => 'Gambia',
            'Georgia' => 'Georgia',
            'Germany' => 'Germany',
            'Ghana' => 'Ghana',
            'Gibraltar' => 'Gibraltar',
            'Greece' => 'Greece',
            'Greenland' => 'Greenland',
            'Grenada' => 'Grenada',
            'Guadeloupe' => 'Guadeloupe',
            'Guam' => 'Guam',
            'Guatemala' => 'Guatemala',
            'Guinea' => 'Guinea',
            'Guinea-bissau' => 'Guinea-bissau',
            'Guyana' => 'Guyana',
            'Haiti' => 'Haiti',
            'Heard Island and Mcdonald Islands' => 'Heard Island and Mcdonald Islands',
            'Holy See (Vatican City State)' => 'Holy See (Vatican City State)',
            'Honduras' => 'Honduras',
            'Hong Kong' => 'Hong Kong',
            'Hungary' => 'Hungary',
            'Iceland' => 'Iceland',
            'India' => 'India',
            'Indonesia' => 'Indonesia',
            'Iran, Islamic Republic of' => 'Iran, Islamic Republic of',
            'Iraq' => 'Iraq',
            'Ireland' => 'Ireland',
            'Israel' => 'Israel',
            'Italy' => 'Italy',
            'Jamaica' => 'Jamaica',
            'Japan' => 'Japan',
            'Jordan' => 'Jordan',
            'Kazakhstan' => 'Kazakhstan',
            'Kenya' => 'Kenya',
            'Kiribati' => 'Kiribati',
            'Korea, Democratic People\'s Republic of' => 'Korea, Democratic People\'s Republic of',
            'Korea, Republic of' => 'Korea, Republic of',
            'Kuwait' => 'Kuwait',
            'Kyrgyzstan' => 'Kyrgyzstan',
            'Lao People\'s Democratic Republic' => 'Lao People\'s Democratic Republic',
            'Latvia' => 'Latvia',
            'Lebanon' => 'Lebanon',
            'Lesotho' => 'Lesotho',
            'Liberia' => 'Liberia',
            'Libyan Arab Jamahiriya' => 'Libyan Arab Jamahiriya',
            'Liechtenstein' => 'Liechtenstein',
            'Lithuania' => 'Lithuania',
            'Luxembourg' => 'Luxembourg',
            'Macao' => 'Macao',
            'Macedonia, The Former Yugoslav Republic of' => 'Macedonia, The Former Yugoslav Republic of',
            'Madagascar' => 'Madagascar',
            'Malawi' => 'Malawi',
            'Malaysia' => 'Malaysia',
            'Maldives' => 'Maldives',
            'Mali' => 'Mali',
            'Malta' => 'Malta',
            'Marshall Islands' => 'Marshall Islands',
            'Martinique' => 'Martinique',
            'Mauritania' => 'Mauritania',
            'Mauritius' => 'Mauritius',
            'Mayotte' => 'Mayotte',
            'Mexico' => 'Mexico',
            'Micronesia, Federated States of' => 'Micronesia, Federated States of',
            'Moldova, Republic of' => 'Moldova, Republic of',
            'Monaco' => 'Monaco',
            'Mongolia' => 'Mongolia',
            'Montserrat' => 'Montserrat',
            'Morocco' => 'Morocco',
            'Mozambique' => 'Mozambique',
            'Myanmar' => 'Myanmar',
            'Namibia' => 'Namibia',
            'Nauru' => 'Nauru',
            'Nepal' => 'Nepal',
            'Netherlands' => 'Netherlands',
            'Netherlands Antilles' => 'Netherlands Antilles',
            'New Caledonia' => 'New Caledonia',
            'New Zealand' => 'New Zealand',
            'Nicaragua' => 'Nicaragua',
            'Niger' => 'Niger',
            'Nigeria' => 'Nigeria',
            'Niue' => 'Niue',
            'Norfolk Island' => 'Norfolk Island',
            'Northern Mariana Islands' => 'Northern Mariana Islands',
            'Norway' => 'Norway',
            'Oman' => 'Oman',
            'Pakistan' => 'Pakistan',
            'Palau' => 'Palau',
            'Palestinian Territory, Occupied' => 'Palestinian Territory, Occupied',
            'Panama' => 'Panama',
            'Papua New Guinea' => 'Papua New Guinea',
            'Paraguay' => 'Paraguay',
            'Peru' => 'Peru',
            'Philippines' => 'Philippines',
            'Pitcairn' => 'Pitcairn',
            'Poland' => 'Poland',
            'Portugal' => 'Portugal',
            'Puerto Rico' => 'Puerto Rico',
            'Qatar' => 'Qatar',
            'Reunion' => 'Reunion',
            'Romania' => 'Romania',
            'Russian Federation' => 'Russian Federation',
            'Rwanda' => 'Rwanda',
            'Saint Helena' => 'Saint Helena',
            'Saint Kitts and Nevis' => 'Saint Kitts and Nevis',
            'Saint Lucia' => 'Saint Lucia',
            'Saint Pierre and Miquelon' => 'Saint Pierre and Miquelon',
            'Saint Vincent and The Grenadines' => 'Saint Vincent and The Grenadines',
            'Samoa' => 'Samoa',
            'San Marino' => 'San Marino',
            'Sao Tome and Principe' => 'Sao Tome and Principe',
            'Saudi Arabia' => 'Saudi Arabia',
            'Senegal' => 'Senegal',
            'Serbia and Montenegro' => 'Serbia and Montenegro',
            'Seychelles' => 'Seychelles',
            'Sierra Leone' => 'Sierra Leone',
            'Singapore' => 'Singapore',
            'Slovakia' => 'Slovakia',
            'Slovenia' => 'Slovenia',
            'Solomon Islands' => 'Solomon Islands',
            'Somalia' => 'Somalia',
            'South Africa' => 'South Africa',
            'South Georgia and The South Sandwich Islands' => 'South Georgia and The South Sandwich Islands',
            'Spain' => 'Spain',
            'Sri Lanka' => 'Sri Lanka',
            'Sudan' => 'Sudan',
            'Suriname' => 'Suriname',
            'Svalbard and Jan Mayen' => 'Svalbard and Jan Mayen',
            'Swaziland' => 'Swaziland',
            'Sweden' => 'Sweden',
            'Switzerland' => 'Switzerland',
            'Syrian Arab Republic' => 'Syrian Arab Republic',
            'Taiwan, Province of China' => 'Taiwan, Province of China',
            'Tajikistan' => 'Tajikistan',
            'Tanzania, United Republic of' => 'Tanzania, United Republic of',
            'Thailand' => 'Thailand',
            'Timor-leste' => 'Timor-leste',
            'Togo' => 'Togo',
            'Tokelau' => 'Tokelau',
            'Tonga' => 'Tonga',
            'Trinidad and Tobago' => 'Trinidad and Tobago',
            'Tunisia' => 'Tunisia',
            'Turkey' => 'Turkey',
            'Turkmenistan' => 'Turkmenistan',
            'Turks and Caicos Islands' => 'Turks and Caicos Islands',
            'Tuvalu' => 'Tuvalu',
            'Uganda' => 'Uganda',
            'Ukraine' => 'Ukraine',
            'United Arab Emirates' => 'United Arab Emirates',
            'United Kingdom' => 'United Kingdom',
            'United States' => 'United States',
            'United States Minor Outlying Islands' => 'United States Minor Outlying Islands',
            'Uruguay' => 'Uruguay',
            'Uzbekistan' => 'Uzbekistan',
            'Vanuatu' => 'Vanuatu',
            'Venezuela' => 'Venezuela',
            'Viet Nam' => 'Viet Nam',
            'Virgin Islands, British' => 'Virgin Islands, British',
            'Virgin Islands, U.S.' => 'Virgin Islands, U.S.',
            'Wallis and Futuna' => 'Wallis and Futuna',
            'Western Sahara' => 'Western Sahara',
            'Yemen' => 'Yemen',
            'Zambia' => 'Zambia'
        ];
    }
}

if (! function_exists('gen_unique_id')) {
    /**
     * Generate unique ID
     *
     * @return string
     */
    function gen_unique_id()
    {
        $id = base_convert(microtime(false), 10, 36);

        return $id;
    }
}
