<?php

use App\Models\Product;
use App\Models\Setting;

if(!function_exists('ip_info')) {
    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE): string|array|null
    {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), '', strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }
}

if(!function_exists('stringEncryption')) {
    function stringEncryption($action, $string): string
    {
        $output = false;

        $encrypt_method = 'AES-256-CBC';                // Default
        $secret_key = '9^x!HX4v%2$4tXF3LR';               // Change the key!
        $secret_iv = 'kGW!ad&N9Auit43swW';  // Change the init vector!

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}

if(!function_exists('settings')) {
    function settings()
    {
        $tryCache = \Illuminate\Support\Facades\Cache::get('settings');

        if (empty($tryCache)) {
            $settings = Setting::where('id', 1)->first();
            \Illuminate\Support\Facades\Cache::add('settings', $settings);

            return $settings;
        }

        return $tryCache;
    }
}

if(!function_exists('user')) {
    function user(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return \Illuminate\Support\Facades\Auth::user();
    }
}

if(!function_exists('cart_items')) {
    function cart_items(): array
    {
        //session()->remove('cart_items');
        return session()->exists('cart_items') ? session()->get('cart_items') : [];
    }
}

if(!function_exists('cart_items_forget')) {
    function cart_items_forget(): void
    {
        session()->forget('cart_items');
    }
}

if(!function_exists('cart_items_count')) {
    function cart_items_count(): int
    {
        $items = cart_items();
        $i = 0;

        if(!empty($items)) {
            foreach($items as $item) {
                $i += $item['amount'];
            }
        }

        return $i;
    }
}

if(!function_exists('is_product_in_cart')) {
    function is_product_in_cart($product_code): bool
    {
        $items = cart_items();

        if(empty($items)) {
            return false;
        }

        if(isset($items[$product_code])) {
            return true;
        }

        return false;
    }
}

if(!function_exists('get_product_from_cart')) {
    function get_product_from_cart($product_code): array|null
    {
        $items = cart_items();

        if(empty($items)) {
            return null;
        }

        if(isset($items[$product_code])) {
            return $items[$product_code];
        }

        return null;
    }
}

if(!function_exists('cart_item_add')) {
    function cart_item_add($product_code, $amount): void
    {
        $items = cart_items();

        if(empty($items)) {
            $item[$product_code]['amount'] = $amount;
            session()->put('cart_items', $item);
        } else {
            if(isset($items[$product_code])) {
                $items[$product_code]['amount'] = $items[$product_code]['amount']+$amount;
            } else {
                $items[$product_code]['amount'] = $amount;
            }
            session()->put('cart_items', $items);
        }
    }
}

if(!function_exists('cart_item_delete')) {
    function cart_item_delete($product_code, $amount = null): void
    {
        $items = cart_items();

        if(!empty($items)) {
            if(isset($items[$product_code])) {
                if (!empty($amount)) {
                    if ($items[$product_code]['amount'] > 1) {
                        $items[$product_code]['amount'] = $items[$product_code]['amount'] - $amount;
                    } else {
                        unset($items[$product_code]);
                    }
                } else {
                    unset($items[$product_code]);
                }

                session()->put('cart_items', $items);
            }
        }
    }
}
