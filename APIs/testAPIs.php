<!DOCTYPE html>
<html>

<head>
    <title>Form Dịch Ngôn Ngữ</title>
    <style>
    body {
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
    }

    form {
      margin: 0 auto;
      text-align: center;
      width: 300px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    select,
    textarea,
    input {
      width: 100%;
      padding: 5px;
      margin-top: 5px;
    }
  </style>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $sourceLanguage = $_POST['sourceLanguage'];
        $targetLanguage = $_POST['targetLanguage'];
        $textToTranslate = $_POST['textToTranslate'];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "q=" . urlencode($textToTranslate) . "&target=" . $targetLanguage . "&source=" . $sourceLanguage,
            CURLOPT_HTTPHEADER => [
                "Accept-Encoding: application/gzip",
                "X-RapidAPI-Host: google-translate1.p.rapidapi.com",
                "X-RapidAPI-Key: 0beabe55damsh30fa4d9331ba435p1e84f0jsn60da76b75430",
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $translatedData = json_decode($response, true);
            $translation = $translatedData["data"]["translations"][0]["translatedText"];
        }
    }
    ?>
    <h1>Dịch Ngôn Ngữ</h1>
    <form method="POST" action="">
        <label for="sourceLanguage">Ngôn ngữ gốc:</label>
        <select name="sourceLanguage">
            <option value="fr">Tiếng Pháp</option>
            <option value="de">Tiếng Đức</option>
            <option value="en">Tiếng Anh</option>
            <option value="vi">Tiếng Việt</option>
            <option value="ja">TIếng Nhật</option>
            <option value="ko">Tiếng Hàn</option>
            <option value="zh">Tiếng Trung</option>

            <!-- Thêm các ngôn ngữ khác vào đây -->
        </select><br><br>
        <input type="text" name="textToTranslate" rows="4" cols="50"></input><br><br>
        <input type="submit" name="submit" value="Dịch"><br><br>

        <label for="targetLanguage">Ngôn ngữ đích:</label>
        <select name="targetLanguage">
            <option value="fr">Tiếng Pháp</option>
            <option value="de">Tiếng Đức</option>
            <option value="en">Tiếng Anh</option>
            <option value="vi">Tiếng Việt</option>
            <option value="ja">TIếng Nhật</option>
            <option value="ko">Tiếng Hàn</option>
            <option value="zh">Tiếng Trung</option>

            <!-- Thêm các ngôn ngữ khác vào đây -->
        </select><br><br>

        <label for="textToTranslate">Văn bản cần dịch:</label>
        

        
        <input type="text" name="text" value="<?php if(isset($translation)) echo $translation; ?>"></input><br><br>
    </form>
</body>
</html>