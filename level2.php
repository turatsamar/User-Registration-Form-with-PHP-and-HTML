<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>.error {color:red}</style>
    <title>アンケート</title>
</head>
<body>
    <p>
    </p>
<?php
//上記で空文字が送信された場合：「氏名が入力されていません。」と表示
//上記が空文字以外が送信された場合：その値を表示
$nameErr = $genderErr = $zip1Err = $zip2Err = $prefErr = $cityErr = $addressErr = $apartmentErr 
= $hobbyErr = $favoriteErr = $opinionErr ="";
$name = $gender = $zip1 = $zip2 = $pref = $city = $address = $apartment = $hobby= $favorite = $opinion ="";

 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST['name']))
    {
        $nameErr = "氏名が入力されていません。";
    }
    else
    {
    $name = test_input($_POST["name"]);

    if (!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $nameErr = "文字と空白のみが許可されます";
        }
    
    }
    if(empty($_POST["gender"])){
        $genderErr = "性別をチェックしてください。";
    }
    else
    {
     $gender = test_input($_POST["gender"]) ;  
    }
    if(empty($_POST["zip1"]))
    {$zip1Err = "郵便番号(3桁)が入力されていません";}
    else
    {$zip1 = test_input($_POST["zip1"]);}
    if(empty($_POST["zip2"])){
        $zip2Err = "郵便番号(4桁)が入力されていません";
    }
    else{$zip2 = test_input($_POST["zip2"]);}
    if(empty($_POST["pref"])){
        $prefErr = "都道府県を選択してください";
    }
    else{$pref = test_input($_POST["pref"]);}
    if(empty($_POST["city"])){
        $cityErr = "市区町村が入力されていません";
    }
    else{$city = test_input($_POST["city"]); }
    if(empty($_POST["address"]))
    {$addressErr="番地が入力されていません";}
    else{ $address = test_input($_POST["address"]);}
    if(empty($_POST["apartment"]))
    {$apartmentErr = "マンション等が入力されていません";}
    else{$apartment = test_input($_POST["apartment"]);}
    //if(empty($_POST["hobby"]))
    //{$hobbyErr = "チェックしてください";}
   // else{$hobby=test_input($_POST["hobby"]);}
   if(empty($_POST["hobby"])){$hobbyErr="趣味をチェックしてください!";}
   if(empty($_POST["favorite"])){$favoriteErr="好きな都道府県を選択してください!";}
  
  if(empty($_POST["opinion"])){$opinionErr = "ご意見本当にないでしょうか";}
  else{$opinion=test_input($_POST["opinion"]);}
}

function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}


?>    
    <h3>アンケート</h3>
    <div>
        作成者：ZHAMALBEKOV TURATBEK
    </div>
    <p><span class="error">* 必須フィールド.</span></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
       
        <fieldset>
         <div>
            <label>名前：</label>
            <input  type="text" name="name" <?php echo $name;?>>
            <span class="error">* <?php echo $nameErr;?></span> 
        </div>
        </fieldset>

       <div>
           <fieldset>
        <label>性別：</label>
        女<input type="radio" name="gender" <?php if (isset($gender) && $gender=="女") echo "checked";?> value="女">
        男<input type="radio" name="gender" <?php if (isset($gender) && $gender=="男") echo "checked";?> value="男">
        <span class="error">* <?php echo $genderErr;?></span>      
    </fieldset>
       </div>

       <fieldset>
       <div>
        <label>郵便番号：</label>
        <input type="text" size="3" name="zip1"  value="<?php echo $zip1;?>">
        <span class="error">* <?php echo $zip1Err;?></span> 
        --<input type="text" size="4" name="zip2" value="<?php echo $zip2;?>">
        <span class="error">* <?php echo $zip2Err;?></span>
       </div>
       </fieldset>

       <fieldset>
       <div>
           <label>都道府県: <span class="error">* <?php echo $prefErr;?></span>
           <select name="pref"  value="<?php echo $pref;?>">
           
           <option value="">-- 選択してください --</option>
        <optgroup label="-- 北海道地方 --">
          <option value="北海道">北海道</option>
        </optgroup>
        <optgroup label="-- 東北地方 --">
          <option value="青森県">青森県</option>
          <option value="岩手県">岩手県</option>
          <option value="宮城県">宮城県</option>
          <option value="秋田県">秋田県</option>
          <option value="山形県">山形県</option>
          <option value="福島県">福島県</option>
        </optgroup>
        <optgroup label="--関東地方--">
            <option value="東京都">東京都</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="神奈川県">神奈川県</option>

        </optgroup>
        <optgroup label="--関西地方--">
            <option value="大阪府">大阪府</option>
            <option value="京都府">京都府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="和歌山県">和歌山県</option>
        </optgroup>
        <optgroup label="--中部--">
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
        </optgroup>
        <optgroup label="--中国--">
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
        </optgroup>
        <optgroup label="--四国--">
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
        </optgroup>
        <optgroup label="--九州沖縄--">
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
        </optgroup>

                    </select>
            </label>
        </div>
       </fieldset>


       <fieldset>
        <div>
            <label>市区町村:</label>
            <input type="text" name="city" size="20" value="<?php echo $city;?>">
            <span class="error">*<?php echo $cityErr;?></span>
        </div>
        <div>
            <label>番地:</label>
            <input type="text" name="address" value="<?php echo $address;?>">
            <span class="error">* <?php echo $addressErr?></span>
        </div>
        <div>
            <label>マンション等:</label>
            <input type="text" name="apartment" value="<?php echo $apartment;?>">
            <span class="error">* <?php echo $apartmentErr;?></span>
        </div>

        </fieldset>


        <fieldset>
        <div> 
            <lagend>趣味:</lagend>
            <input type="checkbox" name="hobby[]"  <?php echo $hobby; ?> value="国内旅行">
           
            <label>国内旅行</label>
            <input type="checkbox" name="hobby[]" <?php echo $hobby; ?> value="海外旅行">
            
            <label>海外旅行</label>
            <input type="checkbox" name="hobby[]" <?php echo $hobby; ?> value="ゲーム" >
            
            <label>ゲーム</label>
            <input type="checkbox" name="hobby[]" <?php echo $hobby; ?> value="ドライブ" >
            
            <label>ドライブ</label>
            <input type="checkbox" name="hobby[]" <?php echo $hobby; ?> value="勉強" >
            
            <label>勉強</label>
            <input type="checkbox" name="hobby[]"<?php echo $hobby; ?> value="料理" >
            
            <label>料理</label>
            <input type="checkbox" name="hobby[]" <?php echo $hobby; ?> value="貯金" >
            
            <label>貯金</label>
            <input type="checkbox" name="hobby[]" <?php echo $hobby; ?> value="ペット" >
            
            <label>ペット</label>
            <input type="checkbox" name="hobby[]" <?php echo $hobby; ?> value="買い物" >
            <label>買い物</label>
            <span class="error">*  <?php echo $hobbyErr?></span>

        </div>
        </fieldset>


        <fieldset>
        <div>
            <legend>好きな都道府県:</legend>
                <label>
                    <select name="favorite[]" size="10"  multiple="" value="<?php echo $favorite; ?>" >
                        <optgroup label="-- 北海道地方 --">
                            <option value="北海道">
                                北海道
                            </option>
                        </optgroup>
                        <optgroup label="-- 東北地方 --">
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                        </optgroup>
                        <optgroup label="--関東地方--">
                            <option value="東京都">東京都</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="神奈川県">神奈川県</option>

                        </optgroup>
                        <optgroup label="--関西地方--">
                            <option value="大阪府">大阪府</option>
                            <option value="京都府">京都府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="三重県">三重県</option>
                            
                        </optgroup>
                        <optgroup label="--中部--">
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                        </optgroup>
                        <optgroup label="--中国--">
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                        </optgroup>
                        <optgroup label="--四国--">
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                        </optgroup>
                        <optgroup label="--九州沖縄--">
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </optgroup>
                    </select>
                    <span class="error">* <?php echo $favoriteErr;?></span>
                </label>
        </div>
        </fieldset>
        <fieldset>
            <div>
               <legend>ご意見：</legend>
               <label>
               
                   <textarea name="opinion" rows="8" cols="50" value="<?php echo $opinion;?>"></textarea>
                   <span class="error"><?php echo $opinionErr;?></span>
                  
                   
               </label> 
            </div>
        </fieldset>
        <div>
            <button type="submit" name="submit" value="回答">回答</button>
        </div>
        
    </form>
    <?php
   if(isset($_POST['submit'])){
   
      if(!empty($_POST['hobby'])){
      foreach($_POST['hobby'] as $checked){
        echo  $checked."</br>";
      }
    }
    else{
    echo '<div class="error">趣味をチェックしてください!</div>';}
  }
  if(isset($_POST['favorite'])){
    if(!empty($_POST['favorite'])){
    foreach($_POST['favorite'] as $checked){
      echo  $checked."</br>";
    }
  }
  else{
  echo '<div class="error">好きな都道府県を選択してください!</div>';}
}
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $gender;
echo "<br>";
echo $zip1 ."--".$zip2;
echo "<br>";
echo $pref;
echo "<br>";
echo $city;
echo "<br>";
echo $address;
echo "<br>";
echo $apartment;
echo "<br>";


echo $opinion;


?>
    
</body>
</html>