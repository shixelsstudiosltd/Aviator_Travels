<?php

//include 'dbc.php';

class User {

    private $email;
    private $mobile_num;
    private $pass;
    private $con_pass;
    private $fname;
    private $lname;
    private $country;
    private $state;
    private $city;
    private $address;
    public $activate_code;
    public $error = false;
    public $in = array();
    public $out = array();

    //public 

    public function __construct($u_array) {
        if (is_array($u_array)) {
            foreach ($u_array as $key => $value) {
                if (!empty($value))
                    filter($value);
                else {
                    echo $key . '=>' . $value;
                    exit();
                }
            }
            $this->out['u_email'] = $this->email = $u_array['u_email'];
            $this->out['u_mobile_num'] = $this->mobile_num = $u_array['u_mobile_num'];
            $this->out['u_pass'] = $this->pass = $u_array['u_pass'];
            $this->out['u_fname'] = $this->fname = $u_array['u_fname'];
            $this->out['u_lname'] = $this->lname = $u_array['u_lname'];
            $this->out['u_country'] = $this->country = $u_array['u_country'];
            $this->out['u_state'] = $this->state = $u_array['u_state'];
//            $this->out['city'] = $this->city = $u_array['u_city'];
//            $this->out['postal'] = $this->postal = '';
//            $this->out['city'] = ucfirst($this->city);
            $this->out['u_address'] = $this->address = $u_array['u_address'];
            if (empty($this->email) || empty($this->mobile_num) || empty($this->pass) ||
                    empty($this->fname) || empty($this->lname) ||
                    empty($this->country) || empty($this->state) ||
                    empty($this->address)) {
//                $this->error = true;
                die('Field empty');
            }
        } else {
            $this->id = $u_array;
        }
    }

    public function register($returnurl = '') {
        
        $this->out['user_ip'] = $user_ip = $_SERVER['REMOTE_ADDR'];
//        $this->out[] = $sha1pass = PwdHash($data['pwd']);
        $this->out['host'] = $host = $_SERVER['HTTP_HOST'];
        $this->out[] = $host_upper = strtoupper($host);
        $this->out['path'] = $path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
//        $this->out['u_activ_code'] = $u_activ_code = rand(1000, 9999);
        $u_email = $this->email;
        $u_mobile_num = $this->mobile_num;
        $u_pass = md5($this->pass);
        $u_activ_code = $this->activate_code = md5($this->email . time());
        $u_fname = $this->fname;
        $u_lname = $this->lname;
        $u_country = $this->country;
        $u_state = $this->state;
//        $u_city = $this->city;
//        $u_postal = $this->postal;
        $u_address = $this->address;
        
        if (!$this->error) {
//             die(print_r($_POST));
            $link = connect();
            $sql_select = "select id as count from `av_users` where `u_email`= '$u_email'";
            $sql_insert_info = "INSERT into `av_users`
			(u_mobile_num, u_email, u_pass, u_fname, u_lname, u_active_code, u_ip, u_state, u_country, u_address)
		    VALUES
                        ('$u_mobile_num','$u_email','$u_pass','$u_fname','$u_lname','$u_activ_code','$user_ip', '$u_state', '$u_country', '$u_address')";

            if ($result = $link->query($sql_select)) {
                $out = $result->fetch_assoc();
                if ($out['count'] > 0) {//user already exist
                    if (isset($_SESSION['aviator_user']['succ']))
                        unset($_SESSION['aviator_user']['succ']);
                    $_SESSION['aviator_user']['error'] = true;
                    $_SESSION['aviator_user']['up_status'] = 'already_register';
                    if (empty($returnurl))
                        header('Location:login_reg');
                    else
                        header('Location:' . $returnurl);
                    exit();
                } else {
                    if ($result = $link->query($sql_insert_info)) {
                        $this->out['uid'] = $addId = $link->insert_id;
                        $_SESSION['aviator_user']['info'] = $this->out;
//                        die(print_r($_SESSION['aviator_user']['info']));
                        $_SESSION['aviator_user']['auth'] = true;
                        $_SESSION['aviator_user']['error'] = false;
                        if (empty($returnurl))
                            header('Location:dashboard');
                        else
                            header('Location:' . $returnurl);
                    } else {
//                        die($link->error);
                        $_SESSION['aviator_user']['error'] = true;
                        if (isset($_SESSION['aviator_user']['succ']))
                            unset($_SESSION['aviator_user']['succ']);
                        $_SESSION['aviator_user']['up_status'] = 'unsucc_reg';
                        if (empty($returnurl))
                            header('Location:login_reg');
                        else
                            header('Location:' . $returnurl);
                    }
                }
            } else {
                $_SESSION['aviator_user']['error'] = true;
                if (isset($_SESSION['aviator_user']['succ']))
                    unset($_SESSION['aviator_user']['succ']);
                $_SESSION['aviator_user']['up_status'] = 'unsucc_reg';
                if (empty($returnurl))
                    header('Location:login_reg');
                else
                    header('Location:'.$returnurl);
            }
        } else {
            $_SESSION['aviator_user']['error'] = true;
            if (isset($_SESSION['aviator_user']['succ']))
                unset($_SESSION['aviator_user']['succ']);
            $_SESSION['aviator_user']['up_status'] = 'unsucc_reg';
           if (empty($returnurl))
                    header('Location:login_reg');
                else
                    header('Location:'.$returnurl);
        }
    }

    public static function login($email, $pass, $returnurl = '') {
//        die("$email, $pass, $returnurl");
        $link = connect();
        $login_q = "SELECT * FROM `av_users`  WHERE `u_email` = '$email'";

        if ($result = $link->query($login_q)) {
            if ($result->num_rows > 0) {
                $row1 = $result->fetch_assoc();
//                if (isset($row1['u_verify']) && $row1['u_verify'] == 1) {
                    if (md5($pass) === $row1['u_pass']) {
                        $_SESSION['aviator_user']['info'] = $row1;
                        $_SESSION['aviator_user']['auth'] = true;
                        $_SESSION['aviator_user']['error'] = false;
//                        die(print_r($_SESSION['aviator_user']));
                        if (empty($returnurl))
                            header('Location:dashboard');
                        else
                            header('Location:' . $returnurl);
                    } 
                    else {
                        $_SESSION['aviator_user']['error'] = true;
                        $_SESSION['aviator_user']['up_status'] = 'invalid_pass';
                        header('Location:' . $returnurl);
                    }
//                }
//                else {
//                    $_SESSION['aviator_user']['error'] = true;
//                    $_SESSION['aviator_user']['up_status'] = 'unverified_email';
//                    header('Location:' . $returnurl);
//                }
            } else {
                $_SESSION['aviator_user']['error'] = true;
                $_SESSION['aviator_user']['up_status'] = 'no_suc_user';
                header('Location:' . $returnurl);
            }
        } else {
//            die($login_q);
            $_SESSION['aviator_user']['error'] = true;
            $_SESSION['aviator_user']['up_status'] = 'login_error';
            header('Location:' . $returnurl);
        }
    }

    public static function saveFlight($flightId) {
        //do save flight and redirect on success
        $_SESSION['flight_booking_suc'] = true;
        header('Location:do_flight_booking');
    }

    public static function updateProfile($mail, $mobil, $fnam, $lnam, $uid) {
        $link = connect();
        if (!isEmail($mail) || empty($mobil) || !is_numeric($mobil) || empty($fnam) || empty($lnam) || !isset($uid) || strlen($mobil) < 7 || strlen($fnam) < 3 || strlen($lnam) < 3) {
            $_SESSION['ushop_user']['error'] = true;
            $_SESSION['ushop_user']['up_status'] = 'input_error';
            url('dashboard');
        }
        $sql = "UPDATE you_shop_users SET u_email = '$mail', u_mobile_num = '$mobil', u_fname = '$fnam', u_lname = '$lnam' WHERE id = '$uid'";
//         die($sql);
        if ($link->query($sql)) {
            $fname = $_SESSION['ushop_user']['fname'] = $fnam;
            $lname = $_SESSION['ushop_user']['lname'] = $lnam;
            $email = $_SESSION['ushop_user']['email'] = $mail;
            $mobile_num = $_SESSION['ushop_user']['mobile_num'] = $mobil;
            $_SESSION['ushop_user']['succ'] = true;
            if (isset($_SESSION['ushop_user']['error']))
                unset($_SESSION['ushop_user']['error']);
            $_SESSION['ushop_user']['up_status'] = 'profile';
            url('dashboard');
        } else {
            $_SESSION['ushop_user']['error'] = true;
            $_SESSION['ushop_user']['up_status'] = 'general_error';
            if (isset($_SESSION['ushop_user']['succ']))
                unset($_SESSION['ushop_user']['succ']);
            url('dashboard');
        }
    }

    public static function saveRequest($arr, $disc) {
        $ship_pref = $_SESSION['ushop_user']['ship_pref']['id'];
        $uid = $_SESSION['ushop_user']['uid'];
        $discount = $disc;
        $sql_insert_req = "INSERT into `u_ship_request`
			(u_ship_type, user_id, discount)
		    VALUES ($ship_pref, $uid, $discount)";
//        die($sql_insert_req);
//        $itemsId = 'Update `you_shop_wh` SET `in_box` = 0 WHERE `id` IN (';
        $insert_ship_items = 'INSERT into `ship_request_item` (item_id, req_shipment_id) VALUES ';
//        die($sql_insert_req);
        $link = connect();
        if ($result = $link->query($sql_insert_req)) {
            if ($link->affected_rows > 0) {
                $shipment_id = $link->insert_id;
                foreach ($arr as $key => $value) {
                    $insert_ship_items .= '(' . $value . ',' . $shipment_id . '),';
//                    $itemsId.= $value . ',';
                }
//                $itemsId = rtrim($itemsId, ',') . ')';
                $insert_ship_items = rtrim($insert_ship_items, ',');
                if ($link->query($insert_ship_items)) {
                    $_SESSION['ushop_user']['succ'] = true;
                    $_SESSION['ushop_user']['up_status'] = 'ship_req_sub';
                    url('dashboard');
                }
            } else {
                $_SESSION['ushop_user']['error'] = true;
                $_SESSION['ushop_user']['up_status'] = 'general_error';
                url('dashboard');
            }
        } else {

//        die($link->error);
            $_SESSION['ushop_user']['error'] = true;
            $_SESSION['ushop_user']['up_status'] = 'general_error ';
            url('dashboard');
        }
    }

    public static function updateAddress($country, $state, $city, $postal, $address, $uid) {
        if (!isset($country) || empty($country) || !isset($state) || empty($state) || !isset($city) || empty($city) || !isset($address) || empty($address) || !isset($uid)) {
            $_SESSION['ushop_user']['error'] = true;
            if (isset($_SESSION['ushop_user']['succ']))
                unset($_SESSION['ushop_user']['succ']);
            $_SESSION['ushop_user']['up_status'] = 'address_input_error';
            url('dashboard');
        }
        $link = connect();
        $sql = "UPDATE you_shop_address SET u_country = '$country', u_state = '$state', u_city = '$city', u_postal = '$postal', u_address = '$address' WHERE u_user_id = '$uid'";
//         die($sql);
        if ($link->query($sql)) {
            $_SESSION['ushop_user']['country'] = $country;
            $_SESSION['ushop_user']['state'] = $state;
            $_SESSION['ushop_user']['city'] = $city;
            $_SESSION['ushop_user']['postal'] = $postal;
            $_SESSION['ushop_user']['address'] = $address;
            $_SESSION['ushop_user']['succ'] = true;
            if (isset($_SESSION['ushop_user']['error']))
                unset($_SESSION['ushop_user']['error']);
            $_SESSION['ushop_user']['up_status'] = 'address';
            url('dashboard');
        } else {
            $_SESSION['ushop_user']['error'] = true;
            if (isset($_SESSION['ushop_user']['succ']))
                unset($_SESSION['ushop_user']['succ']);
            $_SESSION['ushop_user']['up_status'] = 'general_error';
            url('dashboard');
        }
    }

    public static function updatePass($values, $theid) {
        //print_r($values);
        $link = connect();
        if (PwdHash($values['curr_u_pass']) === $_SESSION['ushop_user']['pass'] && !empty($values['curr_u_pass']) && !empty($values['con_new_u_pass']) && (strlen($values['curr_u_pass']) >= 8) && (strlen($values['con_new_u_pass']) >= 8)) {
            if ($values['new_u_pass'] === $values['con_new_u_pass']) {
                $thepass = PwdHash($values['con_new_u_pass']);
                $theid = $_SESSION['ushop_user']['uid'];
                $sql = "UPDATE you_shop_users SET u_pass = '$thepass' WHERE id = '$theid'";
                if ($link->query($sql)) {
                    $_SESSION['ushop_user']['pass'] = $thepass;
                    $_SESSION['ushop_user']['succ'] = true;
                    if (isset($_SESSION['ushop_user']['error']))
                        unset($_SESSION['ushop_user']['error']);
                    $_SESSION['ushop_user']['up_status'] = 'pass';
                    url('dashboard');
                } else {
                    $_SESSION['ushop_user']['error'] = true;
                    if (isset($_SESSION['ushop_user']['succ']))
                        unset($_SESSION['ushop_user']['succ']);
                    $_SESSION['ushop_user']['up_status'] = 'general_error';
                    url('dashboard');
                }
            } else {
                $_SESSION['ushop_user']['error'] = true;
                if (isset($_SESSION['ushop_user']['succ']))
                    unset($_SESSION['ushop_user']['succ']);
                $_SESSION['ushop_user']['up_status'] = 'not_same_pass';
                url('dashboard');
            }
        } else {
            $_SESSION['ushop_user']['error'] = true;
            if (isset($_SESSION['ushop_user']['succ']))
                unset($_SESSION['ushop_user']['succ']);
            $_SESSION['ushop_user']['up_status'] = 'pass_invalid';
            url('dashboard');
        }
    }

    public static function sendPassReset($email) {
        if (!isEmail($email)) {
            $_SESSION['ushop_user']['error'] = true;
            if (isset($_SESSION['ushop_user']['succ']))
                unset($_SESSION['ushop_user']['succ']);
            $_SESSION['ushop_user']['up_status'] = 'reset_email_invalid';
            url('loginreg');
        }

        $token = md5($email . time());
        $link = connect();
        $reset_q = "Update you_shop_users SET u_passreset_token = '$token'  WHERE u_email = '$email' Limit 1";
        $reset_q1 = "Select u_fname, u_lname From you_shop_users WHERE u_email ='$email'";
        if ($link->query($reset_q) && ($res = $link->query($reset_q1))) {
            $arr = $res->fetch_assoc();
//            print_r($arr);            exit();
            if (is_array($arr) && !empty($arr)) {
//                print_r($arr[0]);
                $fname = $arr['u_fname'];
                $lname = $arr['u_lname'];
                $_SESSION['ushop_user']['succ'] = true;
                if (isset($_SESSION['ushop_user']['error']))
                    unset($_SESSION['ushop_user']['error']);
                $_SESSION['ushop_user']['up_status'] = 'reset_link_sent';
                User::sendResetEmail($fname, $lname, $email, $token);
                url('loginreg');
            } else {
                $_SESSION['ushop_user']['error'] = true;
                if (isset($_SESSION['ushop_user']['succ']))
                    unset($_SESSION['ushop_user']['succ']);
                $_SESSION['ushop_user']['up_status'] = 'reset_email_invalid';
                url('loginreg');
            }
        } else {
//            die($link->error);
            $_SESSION['ushop_user']['error'] = true;
            if (isset($_SESSION['ushop_user']['succ']))
                unset($_SESSION['ushop_user']['succ']);
            $_SESSION['ushop_user']['up_status'] = 'general_error';
            url('loginreg');
        }
    }

    public static function resetPass($pass1, $pass2, $token) {
        $link = connect();
        if (!empty($pass1) && !empty($pass2) && (strlen($pass1) >= 8) && (strlen($pass2) >= 8)) {
            if ($pass1 === $pass2) {
                $thepass = PwdHash($pass2);
                $sql = "UPDATE you_shop_users SET u_pass = '$thepass' WHERE u_passreset_token = '$token'";
//                die($sql);
                if ($link->query($sql)) {
                    $_SESSION['ushop_user']['succ'] = true;
                    if (isset($_SESSION['ushop_user']['error']))
                        unset($_SESSION['ushop_user']['error']);
                    $_SESSION['ushop_user']['up_status'] = 'pass_reset_succ';
                    url('loginreg');
                } else {
                    $_SESSION['ushop_user']['error'] = true;
                    if (isset($_SESSION['ushop_user']['succ']))
                        unset($_SESSION['ushop_user']['succ']);
                    $_SESSION['ushop_user']['up_status'] = 'pass_reset_error';
                    url("reset_$token");
                }
            } else {
                $_SESSION['ushop_user']['error'] = true;
                if (isset($_SESSION['ushop_user']['succ']))
                    unset($_SESSION['ushop_user']['succ']);
                $_SESSION['ushop_user']['up_status'] = 'not_same_pass';
                url("reset_$token");
            }
        } else {
            $_SESSION['ushop_user']['error'] = true;
            if (isset($_SESSION['ushop_user']['succ']))
                unset($_SESSION['ushop_user']['succ']);
            $_SESSION['ushop_user']['up_status'] = 'pass_invalid';
            url("reset_$token");
        }
    }

    public static function isValidResetToken($resetToken) {
        $link = connect();
        $arrItem = array();
        $item_q = "SELECT id FROM `you_shop_users` WHERE `u_passreset_token` =  '$resetToken'";
        if ($result = $link->query($item_q)) {
            if ($result->num_rows == 1) {
                return true;
            }
        } else {
            return false;
        }
    }

    public static function isRequested($itemId) {
        $link = connect();
        $item_q = "SELECT count(id) as count From ship_request_item Where item_id = $itemId";
        if ($result = $link->query($item_q)) {
            if ($result->num_rows > 0) {
                $row1 = $result->fetch_assoc();
                return ($row1['count'] == 0) ? true : false;
            }
        } else {
            return false;
        }
    }

    public static function getItem($uid) {
        $link = connect();
        $arrItem = array();
        $item_q = "SELECT * FROM `you_shop_wh` WHERE `u_user_id` =  '$uid' AND shipped = 0 ORDER BY u_item_arrival DESC";
        if ($result = $link->query($item_q)) {
            $shpiId = $_SESSION['ushop_user']['ship_pref']['id'];
            $uid = $_SESSION['ushop_user']['uid'];
            if ($result->num_rows > 0) {
                while ($row1 = $result->fetch_assoc()) {
                    $row1['u_shipment_cost'] = User::getShipCost($shpiId, $row1['id'], $uid);
                    $row1['in_box'] = User::isRequested($row1['id']);
                    $arrItem[] = $row1;
                }
                return $arrItem;
            }
        } else {
            return false;
        }//sendPassReset
    }

    public static function getShipItem($uid) {
        $link = connect();
        $arrItem = array();
        $uid = $_SESSION['ushop_user']['uid'];
        $item_q = "Select * From u_ship_request WHERE user_id = $uid ORDER BY request_date DESC";
        if ($result = $link->query($item_q)) {

            if ($result->num_rows > 0) {
                while ($row1 = $result->fetch_assoc()) {
//                    $row1['u_shipment_cost'] = User::getShipCost($row1['u_ship_type'], $row1['id'], $uid);
                    $arrItem[] = $row1;
                }
                return $arrItem;
            }
        } else {
            return false;
        }
    }

    public static function getShipItemDetail($shipId) {
        $link = connect();
        $arrItem = array();
        $uid = $_SESSION['ushop_user']['uid'];
        $item_q = "Select DISTINCT you_shop_wh.id as item_id, u_item_desc, u_item_qty, u_mass
                    From  you_shop_wh Where you_shop_wh.id IN (Select item_id From ship_request_item Where req_shipment_id = $shipId)";
        if ($result = $link->query($item_q)) {
            if ($result->num_rows > 0) {
                while ($row1 = $result->fetch_assoc()) {
                    $arrItem['id'][] = $row1['item_id'];
                    $arrItem['items'][] = $row1;
                }
                return $arrItem;
            }
        } else {
            return false;
        }
    }

    public static function getShipOrderCost($arr, $shipId) {
        $arrId = '';
        foreach ($arr as $value) {
            $arrId.= $value . ',';
        }
        $arrId = rtrim($arrId, ',');
        $link = connect();
        $arrItem = array();
        $uid = $_SESSION['ushop_user']['uid'];
        $item_q = "Select SUM(u_shipment_cost) as cost From u_shippments WHERE u_item_id IN ($arrId) AND u_shippment_type_id = $shipId";
//        die($item_q);
        if ($result = $link->query($item_q)) {
            if ($result->num_rows > 0) {
                while ($row1 = $result->fetch_assoc()) {
                    $arrItem[] = $row1;
                }
                return $arrItem;
            }
        } else {
            return false;
        }
    }

    public static function getItemUnit($uid, $idArr) {
        $link = connect();
        $arrItem = array();
        $in = '(';
        foreach ($idArr as $value) {
            $in.=$value . ',';
        }
        $in = rtrim($in, ',') . ')';
        $item_q = "SELECT * FROM `you_shop_wh` WHERE `u_user_id` =  '$uid' AND `id` IN $in";
        if ($result = $link->query($item_q)) {
            $shpiId = $_SESSION['ushop_user']['ship_pref']['id'];
            $uid = $_SESSION['ushop_user']['uid'];
            if ($result->num_rows > 0) {
                while ($row1 = $result->fetch_assoc()) {
                    $row1['u_shipment_cost'] = User::getShipCost($shpiId, $row1['id'], $uid);
                    $arrItem[] = $row1;
                }
                return $arrItem;
            }
        } else {
            return false;
        }//sendPassReset
    }

    public static function getShipCost($shpiId, $itemId, $uid) {
        $link = connect();
        $arrItem = array();
        $item_q = "SELECT u_shipment_cost FROM `u_shippments` WHERE `u_user_id` =  $uid AND `u_item_id` = $itemId AND `u_shippment_type_id` = $shpiId";
        if ($result = $link->query($item_q)) {
            if ($result->num_rows > 0) {
                $row1 = $result->fetch_assoc();
                $_SESSION['ushop_user']['u_shipment_cost'] = $row1['u_shipment_cost'];
                return $row1['u_shipment_cost'];
            } else {
                
            }
        } else {
            
        }
    }

//getItemCount($uid);


    public static function getBoxId($uid) {
        $link = connect();
        $item_q = "SELECT u_box_id FROM `you_shop_boxes` WHERE `u_user_id` =  '$uid' Limit 1";
        if ($result = $link->query($item_q)) {
            if ($result->num_rows > 0) {
                $row1 = $result->fetch_assoc();
                return $row1['u_box_id'];
            }
        } else {
            return false;
        }//sendPassReset
    }

    public static function sendResetEmail($fname, $lname, $email, $token) {
        $name = $fname . ' ' . $lname;
        $url = (REWRITE) ? BASE_URL . "/reset_$token" : BASE_URL . "/?page=reset_$token";
        $imglink = BASE_URL . '/images/';
        $msg = "<!doctype html><html><head><meta charset=utf-8>
        <style>#welcomeinfo{font:14px 'Open Sans',sans-serif;font-weight:normal;line-height:23px;color:#727272}.pointhead{color:green;text-align:center}</style>
        <body>
        <div class=wrapper_boxed>
        <div class=site_wrapper style='width:640px!important;padding-left:25px;border:1px #ccc solid;margin:10px auto'>
        <div class=clearfix></div>
        <div class=container>
        <div class style=width:600px!important;padding-left:10px;min-height:10px!important>
        <h2 style=color:#ff8100>Hey, <b> $fname </b></h2>
        <div class=parallax_sec1 style='width:600px!important;min-height:10px!important; background:black !important;'></div><br>
        <div id=welcomeinfo>
        We just received a password reset request on your behalf. If you initiated this request, click the link below to reset your password. If however you were not aware of this request, just ignore this email and your login details will remian intact.
        <br><br>
        <center><a target=_blank href='$url'>Click here to reset your password</a></center>
        <br>
        </div>
        </div>
       <div class=parallax_sec1 style='margin-left:10px;width:590px!important;padding-left:10px;min-height:10px!important; background:black !important;'></div><br>
        <h1 style=padding-left:100px;margin-bottom:-15px;color:#ff8100>Just 3 steps and you're done!</h1>
        <div class=container_full style=width:680px!important>
        <div class=feature_section81>
        <div class=container>
        <table>
        <tr>
        <td>
        <div class='one_fifth animate fadeIn' data-anim-type=fadeIn data-anim-delay=200>
        <h4 class=pointhead>Shop & Ship</h4>
        <img src='" . $imglink . 'sho.jpg' . "' alt class=img_left1 width=200px;>
        </div>
        </td>
        <td>
        <div class='one_fifth animate fadeIn' data-anim-type=fadeIn data-anim-delay=300>
        <h4 class=pointhead>Request home delivery</h4>
        <img src='" . $imglink . 'quote.jpg' . "' alt class=img_left1 width=200px;>
        </div>
        </td>
        <td>
        <div class='one_fifth last animate fadeIn' data-anim-type=fadeIn data-anim-delay=400>
        <h4 class=pointhead>Receive you item</h4>
        <img src='" . $imglink . 'deliver.jpg' . "' alt class=img_left1 width=200px;>
        </div>
        </td>
        </tr>
        </table>
        </div>
        </div>
        <div class=clearfix></div>
        </div>
        <div class=parallax_sec1 style='width:560px!important;padding-left:10px;min-height:10px!important; background:black !important;padding:25px;'><br>
        <h1 style='text-align:center; color:white;'>You've got no reason to worry over your shipment. We are expert @ what we do.</h1>
        <p>&nbsp;</p>
        </div>
        </div><br>
        </div>
        </div>
        </body>
        </html>";
        $to = "$name<$email>";
        $subject = "Password Reset";
        $headers = "From: YouShopWeSend Team<account@youshopwesend.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        @mail($to, $subject, $msg, $headers);
    }

    public static function sendEmail($fname, $lname, $email, $token) {
        $name = $fname . ' ' . $lname;
        $url = (REWRITE) ? BASE_URL . "/verify_$token" : BASE_URL . "/?page=verify_$token";
        $imglink = BASE_URL . '/images/';
        $msg = "<!doctype html><html><head><meta charset=utf-8>
        <style>#welcomeinfo{font:14px 'Open Sans',sans-serif;font-weight:normal;line-height:23px;color:#727272}.pointhead{color:green;text-align:center}</style>
        <body>
        <div class=wrapper_boxed>
        <div class=site_wrapper style='width:640px!important;padding-left:25px;border:1px #ccc solid;margin:10px auto'>
        <div class=clearfix></div>
        <div class=container>
        <div class style=width:600px!important;padding-left:10px;min-height:10px!important>
        <h2 style=color:#ff8100>Welcome, <b> $fname </b></h2>
        <div class=parallax_sec1 style='width:600px!important;min-height:10px!important; background:black !important;'></div><br>
        <div id=welcomeinfo>
         We are glad to welcome you to our world of easier global shipping solution. To continue using your account, you have to click the provided link
        below to verify your email address. <br><br>Note that email verification is a must or you will not be able to login to your account afterwards.
        <br><br>
        <center><a target=_blank href='  $url '>Click here to verify your email</a></center>
        <br>
        </div>
        </div>
       <div class=parallax_sec1 style='margin-left:10px;width:590px!important;padding-left:10px;min-height:10px!important; background:black !important;'></div><br>
        <h1 style=padding-left:100px;margin-bottom:-15px;color:#ff8100>Just 3 steps and you're done!</h1>
        <div class=container_full style=width:680px!important>
        <div class=feature_section81>
        <div class=container>
        <table>
        <tr>
        <td>
        <div class='one_fifth animate fadeIn' data-anim-type=fadeIn data-anim-delay=200>
        <h4 style='color:#7ab700 !important;text-align:center;'>Shop & Ship</h4>
        <img src='" . $imglink . 'sho.jpg' . "' alt class=img_left1 width=200px;>
        </div>
        </td>
        <td>
        <div class='one_fifth animate fadeIn' data-anim-type=fadeIn data-anim-delay=300>
        <h4 style='color:#7ab700 !important;text-align:center;'>Request home delivery</h4>
        <img src='" . $imglink . 'quote.jpg' . "' alt class=img_left1 width=200px;>
        </div>
        </td>
        <td>
        <div class='one_fifth last animate fadeIn' data-anim-type=fadeIn data-anim-delay=400>
        <h4 style='color:#7ab700 !important;text-align:center;'>Receive you item</h4>
        <img src='" . $imglink . 'deliver.jpg' . "' alt class=img_left1 width=200px;>
        </div>
        </td>
        </tr>
        </table>
        </div>
        </div>
        <div class=clearfix></div>
        </div>
        <div class=parallax_sec1 style='width:560px!important;padding-left:10px;min-height:10px!important; background:black !important;padding:25px;'><br>
        <h1 style='text-align:center; color:white;'>You've got no reason to worry over your shipment. We are expert @ what we do.</h1>
        <p>&nbsp;</p>
        </div><br>
        </div><br>
        </div>
        </div>
        </body>
        </html>";
        $to = "$name<$email>";
        $subject = "Email Verification";
        $headers = "From: YouShopWeSend Verification<verify@youshopwesend.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        @mail($to, $subject, $msg, $headers);
    }

    public static function verify($token) {
        $link = connect();
        $login_q = "SELECT `you_shop_users`.id as id, `u_mobile_num` as `mobile_num`,  `u_email` as `email`, `u_pass` as `pass`,`u_fname` as `fname`, `u_lname` `lname`, `u_country` as `country`, `u_state` as `state`, `u_postal` as `postal`, `u_address` as `address`, `u_box_id` as `box_id`, `u_city` as `city`, `u_verify` as `verify`
                    FROM `you_shop_users`, `you_shop_address`, `you_shop_boxes`  WHERE `you_shop_users`.id = `you_shop_address`.u_user_id AND `you_shop_users`.id = `you_shop_boxes`.u_user_id AND  `u_banned` = 0 AND `u_active_code` = '$token'";
        if ($result = $link->query($login_q)) {
            if ($result->num_rows > 0) {
                $row1 = $result->fetch_assoc();
//                print_r($row1); die();
                if ($row1['verify'] == 0) {//email not verified  
//                    die('Here');
                    $verify_q = "Update you_shop_users SET u_verify = 1 WHERE u_active_code = '$token' Limit 1";
                    if ($res = $link->query($verify_q)) {
                        if ($link->affected_rows > 0) {  //die($login_q);
                            $_SESSION['ushop_user'] = $row1;
                            $_SESSION['ushop_user']['uid'] = $row1['id'];
                            $_SESSION['ushop_user']['item_count'] = count(User::getItem($row1['id']));
                            $_SESSION['ushop_user']['auth'] = true;
                            $_SESSION['ushop_user']['succ'] = true;
                            if (isset($_SESSION['ushop_user']['error']))
                                unset($_SESSION['ushop_user']['error']);
                            $_SESSION['ushop_user']['up_status'] = 'email_verify';
                            url('dashboard');
                        }
                    } else {
                        $_SESSION['ushop_user']['error'] = true;
                        if (isset($_SESSION['ushop_user']['succ']))
                            unset($_SESSION['ushop_user']['succ']);
                        $_SESSION['ushop_user']['up_status'] = 'general_error';
                        url('loginreg');
                    }
                } else {
                    unset($_SESSION['ushop_user']);
                    $_SESSION['ushop_user']['error'] = true;
                    if (isset($_SESSION['ushop_user']['succ']))
                        unset($_SESSION['ushop_user']['succ']);
                    $_SESSION['ushop_user']['up_status'] = 'verify_already';
                    url('loginreg');
                }
            } else {
                $_SESSION['ushop_user']['error'] = true;
                if (isset($_SESSION['ushop_user']['succ']))
                    unset($_SESSION['ushop_user']['succ']);
                $_SESSION['ushop_user']['up_status'] = 'invalid_verify_token';
                url('loginreg');
            }
        }
    }

    public static function getShipPref($id) {
        $link = connect();
        $item = "SELECT * From u_shipment_ways WHERE `id` =  '$id' Limit 1";
        if ($result = $link->query($item)) {
            if ($result->num_rows > 0) {
                $row1 = $result->fetch_assoc();
                return $row1['type'];
            }
        } else {
            return false;
        }
    }

    public static function updateShipPref($shiptype, $id) {
        $link = connect();
        if (empty($shiptype) || empty($id)) {
            $_SESSION['ushop_user']['error'] = true;
            $_SESSION['ushop_user']['up_status'] = 'input_error';
            url('dashboard');
        }
        $sql = "UPDATE you_shop_users SET u_default_shiptype = $shiptype WHERE id = '$id' Limit 1";
        if ($link->query($sql)) {
            $_SESSION['ushop_user']['succ'] = true;
            $_SESSION['ushop_user']['ship_pref'] = array('id' => $shiptype, 'ship_pref' => User::getShipPref($shiptype));
            $_SESSION['ushop_user']['up_status'] = 'ship_pref_up';
            if (isset($_SESSION['ushop_user']['error']))
                unset($_SESSION['ushop_user']['error']);
            url('dashboard');
        } else {
            $_SESSION['ushop_user']['error'] = true;
            $_SESSION['ushop_user']['up_status'] = 'general_error';
            if (isset($_SESSION['ushop_user']['succ']))
                unset($_SESSION['ushop_user']['succ']);
            url('dashboard');
        }
    }

    public static function Logout() {
        if (isset($_SESSION['aviator_user']['auth'])) {
            unset($_SESSION['ushop_user']['auth']);
            unset($_SESSION['ushop_user']['info']);
            unset($_SESSION['HTTP_USER_AGENT']);

            session_unset();
            session_destroy();
            header('Location:home');
        } else {
            unset($_SESSION);
            session_unset();
            session_destroy();
            header('Location:home');
        }
    }

}
