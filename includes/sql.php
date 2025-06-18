<?php
  require_once('includes/load.php');
date_default_timezone_set("Africa/Accra");
$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('Y-m-d\TH:i'); 
/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
//   echo '<pre>';
// print_r($result_set[0]['id']);
// echo '</pre>';
// die();
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
// function find_by_column($table,$column,$id)
// {
//   global $db;
//   $id = (int)$id;
//     if(tableExists($table)){
//           $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE $column='{$db->escape($id)}' LIMIT 1");
//           if($result = $db->fetch_assoc($sql))
//             return $result;
//           else
//             return null;
//      }
// }

function find_by_column($table,$column,$id) {
   global $db;
  //$id = (int)$id;
   if(tableExists($table))
   {

     $sql = "SELECT * FROM {$db->escape($table)} WHERE $column='{$db->escape($id)}' ";
       //print_r($sql);
       //die();
       $result = find_by_sql($sql);
       //print_r($result);
      return $result;
   }
}
  
  function join_one_food_table_admin($id){
     global $db;
     $sql  =" SELECT p.id,p.Title,p.Description,p.Price,p.CategoryId,p.Currency,p.date_created,p.date_created,p.date_modified,c.name";
    $sql  .=" AS categorie,c.Description AS categorieDesc,p.media_id,m.file_name AS image";;
    $sql  .=" FROM foods p";
    $sql  .=" JOIN foodcategory c ON c.id = p.CategoryId";
    $sql  .=" JOIN media m ON m.id = p.media_id";
    $sql  .=" WHERE p.id = $id";
    $sql  .=" LIMIT 1";
    return find_by_sql($sql);

   }
function find_one_by_column($table,$column,$id) {
   global $db;
  $id = (int)$id;
   if(tableExists($table))
   {

     //$sql = "SELECT * FROM {$db->escape($table)} WHERE $column='{$db->escape($id)}' LIMIT 1";
     $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE $column='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
// print_r($sql);die();
       $result = find_by_sql($sql);
      return $result;
   }
}
  function print_array($data){
    print "<pre>";
    print_r($data);
    print "</pre>";
  }
  function find_all_orders(){
   global $db;
   $sql  = "SELECT o.id as ID,o.OrderId,o.Total,o.CustomerId,o.TableID,o.OrderTable,o.PaymentMethod,o.Status as orderstatus,o.Contact as OrderContact,o.date_created,o.date_modified,";
   $sql .= " t.id as T_ID,t.name as tablename,t.status as tablestatus,";
   $sql .= " c.Id as Customer_Id,c.FirstName, c.MiddleName, c.LastName,c.PreferredName, c.Contact as CustomerContact, c.Email";
   $sql .= " FROM orders o";
   $sql .= " LEFT JOIN tables t ON o.TableID = t.id";
   $sql .= " LEFT JOIN customers c ON o.CustomerId = c.id";
   return find_by_sql($sql);
 }

   function find_all_pending_orders(){
   global $db;
   $sql  = "SELECT o.id as ID,o.OrderId,o.Total,o.CustomerId,o.TableID,o.OrderTable,o.PaymentMethod,o.Status as orderstatus,o.Contact,o.date_created,o.date_modified,";
   $sql .= " t.id as T_ID,t.name as tablename,t.status as tablestatus,";
   $sql .= " c.Id as Customer_Id,c.FirstName, c.MiddleName, c.LastName,c.PreferredName, c.Contact, c.Email";
   $sql .= " FROM orders o";
   $sql .= " LEFT JOIN tables t ON o.TableID = t.id";
   $sql .= " LEFT JOIN customers c ON o.CustomerId = c.id";
   return find_by_sql($sql);
 }

   function find_all_processing_orders(){
   global $db;
   $sql  = "SELECT o.id as ID,o.OrderId,o.Total,o.CustomerName,o.Contact as OrderContact,o.CustomerId,o.TableID,o.OrderTable,o.PaymentMethod,o.Status as orderstatus,o.Contact,o.date_created,o.date_modified,";
   $sql .= " t.id as T_ID,t.name as tablename,t.status as tablestatus,";
   $sql .= " c.Id as Customer_Id,c.FirstName, c.MiddleName, c.LastName,c.PreferredName, c.Contact, c.Email";
   $sql .= " FROM orders o";
   $sql .= " LEFT JOIN tables t ON o.TableID = t.id";
   $sql .= " LEFT JOIN customers c ON o.CustomerId = c.id";
   $sql .= " where o.Status = 'Pending'";
   return find_by_sql($sql);
 }


   function find_all_completed_orders(){
   global $db;
   $sql  = "SELECT o.id as ID,o.OrderId,o.Total,o.CustomerId,o.TableID,o.OrderTable,o.PaymentMethod,o.Status as orderstatus,o.Contact,o.date_created,o.date_modified,";
   $sql .= " t.id as T_ID,t.name as tablename,t.status as tablestatus,";
   $sql .= " c.Id as Customer_Id,c.FirstName, c.MiddleName, c.LastName,c.PreferredName, c.Contact, c.Email";
   $sql .= " FROM orders o";
   $sql .= " LEFT JOIN tables t ON o.TableID = t.id";
   $sql .= " LEFT JOIN customers c ON o.CustomerId = c.id";
   return find_by_sql($sql);
 }

   function find_all_orderDetails($int){
   global $db;
   $sql  = "SELECT o.id as ID,o.OrderId,o.FoodId,o.Quantity,o.Amount,o.Food_unit_price,o.date_created,o.date_modified,";
   $sql .= "f.id as F_ID,f.Title AS foodname,f.Description,f.Price,f.CategoryId,f.Currency,f.media_id,";
   $sql .= "fc.id as FC_ID,fc.name AS category, fc.Description AS fooddesc, ";
   $sql .= " m.id,m.file_name, m.file_type";
   $sql .= " FROM orderdetails o";
   $sql .= " LEFT JOIN foods f ON f.id = o.FoodId";
   $sql .= " LEFT JOIN foodcategory fc ON fc.id = f.CategoryId";
   $sql .= " LEFT JOIN media m ON m.id = f.media_id";
   $sql .= " WHERE o.OrderId = $int";
   return find_by_sql($sql);
 }


 function update_order_total($int){
       global $db;
       date_default_timezone_set("Africa/Accra");
       $currentDateTime = new DateTime('now');
       $currentDate = $currentDateTime->format('Y-m-d\TH:i'); 
       $orderDetails=find_all_orderDetails($int);
 // $totalamount=array_sum($orderDetails['Amount']);
    $totalamount=0.00;
     foreach ($orderDetails as  $oDetails) {
       $totalamount = (double)$totalamount + (double)$oDetails['Amount'] ;
     }
    $order = find_one_by_column('orders','OrderId',(int)$int);

        $query   = "UPDATE orders SET";
       $query  .=" Total ='{$totalamount}', date_modified = '{$currentDate}' ";      
       $query  .=" WHERE Id ='{$order['id']}'";
       // echo $query  ; die();
       $result = $db->query($query);
               if($result || $db->affected_rows() === 1){
                return 1;
               } else {
                return 0;
               }
 }
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/


function find_by_sql_assoc_admin($sql)
{
  global $db;
  $result = $db->query($sql);
  // $result_set = $db->while_loop_assoc($result);
//   echo '<pre>';
// print_r($result_set[0]['id']);
// echo '</pre>';
// die();
 return $result;
}


   
   function getActiveTax_Admin(){

      global $db;
      $sql  = "SELECT * from  taxes ";
      $sql .= "WHERE status = 'active' ";

      return find_by_sql($sql);

    }


function getSettings_admin(){

      global $db;
      $results = array();
      $sql = "SELECT * from  settings ";
      $result = find_by_sql_assoc_admin($sql);

      foreach ($result as  $value) {
        $results[$value["name"]] = $value["value"];
      }

        // print_array($results);
      return $results;

}

function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
  //            echo '<pre>';
  // print_r($db->num_rows($result));
  // echo '</pre>';
  // die();
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;

     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
  //      echo '<pre>';
  // print_r($current_user);
  // echo '</pre>';

  //        echo '<pre>';
  // print_r($login_level);
  // echo '</pre>';
  // die();
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Please login...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level === '0'):
           $session->msg('d','This level user has been band!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "Sorry! you dont have permission to view the page.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.id,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,c.name";
    $sql  .=" AS categorie,m.file_name AS image";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);

   }

     function join_food_table(){
     global $db;
     $sql  =" SELECT p.id,p.Title,p.Description,p.Price,p.CategoryId,p.Currency,p.date_created,p.date_created,p.date_modified,c.name";
    $sql  .=" AS categorie,c.Description AS categorieDesc,p.media_id,m.file_name AS image";;
    $sql  .=" FROM foods p";
    $sql  .=" JOIN foodcategory c ON c.id = p.CategoryId";
    $sql  .=" JOIN media m ON m.id = p.media_id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);

   }

     function join_food_table_admin($id){
     global $db;
     $sql  =" SELECT p.id,p.Title,p.Description,p.Price,p.CategoryId,p.Currency,p.date_created,p.date_created,p.date_modified,c.name";
    $sql  .=" AS categorie,c.Description AS categorieDesc,p.media_id,m.file_name AS image";;
    $sql  .=" FROM foods p";
    $sql  .=" JOIN foodcategory c ON c.id = p.CategoryId";
    $sql  .=" JOIN media m ON m.id = p.media_id";
    $sql  .=" WHERE p.CategoryId = $id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);

   }

    function searchFood($foodname){

      global $db;
     $sql  =" SELECT p.id,p.Title,p.Description,p.Price,p.CategoryId,p.Currency,p.date_created,p.date_created,p.date_modified,c.name";
    $sql  .=" AS categorie,c.Description AS categorieDesc,p.media_id,m.file_name AS image";;
    $sql  .=" FROM foods p";
    $sql  .=" JOIN foodcategory c ON c.id = p.CategoryId";
    $sql  .=" JOIN media m ON m.id = p.media_id";
    $sql  .=" WHERE p.Title LIKE '%".$foodname."%'";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);

    }


  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT id, name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
    function update_product_qty_stock($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity +'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    // print_d($sql);
    return($db->affected_rows() === 1 ? true : false);

  }

  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    // print_d($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id,p.name,p.sale_price,p.media_id,c.name AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
   global $db;
   $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
   $sql .= " GROUP BY s.product_id";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }

  function find_higest_selling_food($limit){
   global $db;
   $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
   $sql .= " GROUP BY s.product_id";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }

 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
   $sql .= " ORDER BY s.date DESC";
   return find_by_sql($sql);
 }



  /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_stock(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.total,s.product_id,s.date,p.name,p.id as 'p_id'";
   $sql .= " FROM stocks s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
   $sql .= " ORDER BY s.date DESC";
//    echo '<pre>';
// print_r($sql);
// echo '</pre>';
// die();
   return find_by_sql($sql);
 }

 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
// /*--------------------------------------------------------------*/
// /* Function for Generate Daily sales report
// /*--------------------------------------------------------------*/
// function  dailySales($year,$month){
//   global $db;
//   $sql  = "SELECT s.qty,";
//   $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
//   $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
//   $sql .= " FROM sales s";
//   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
//   $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
//   $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
//   return find_by_sql($sql);
// }

/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($date){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%d') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m-%d' ) = '{$date}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%d' ),s.product_id";
  //return $sql;
  return find_by_sql($sql);
}

/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}

 function select_product()
{
    global $db;
   $query = "SELECT * FROM products ";
        $stmt = $db->query($query);
        $num = mysqli_num_rows($stmt);
        if($num == 0){
            return false.'|There is no products';
        }
        else {
            $slt='';
            while ($row=mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                // $brid = $row['brid'];
              $slt.='<option value="'.$row["name"]. '" >'. $row["name"].'</option>';
            }
            return true.'|'.$slt;
        }
}

 function select_product_stock()
{
    global $db;
   $query = "SELECT * FROM products ";
        $stmt = $db->query($query);
        $num = mysqli_num_rows($stmt);
        if($num == 0){
            return false.'|There is no products';
        }
        else {
            $slt='';
            while ($row=mysqli_fetch_array($stmt, MYSQLI_ASSOC)) {

                // $brid = $row['brid'];
              $slt.='<option value="'.$row["id"]. '" >'. $row["name"].'</option>';
            }
            return true.'|'.$slt;
        }
}
?>
