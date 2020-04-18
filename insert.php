<?php




if (isset($_POST['submit'])){

    $baslik = isset($_POST['baslik']) ? $_POST['baslik'] : null;
    $icerik = isset($_POST['icerik']) ? $_POST['icerik'] : null;
    $onay = isset($_POST['onay']) ? $_POST['onay'] : null;

    if(!$baslik){
        echo 'Başlık Ekleyin';
    }elseif (!$icerik){
        echo 'İçeriği Belirleyin';
    }else{

        //ekleme işlemi
        //INSERT INTO tablo_adı SET kolon1 = deger1

$sorgu  = $db ->prepare('INSERT INTO dersler SET
baslik = ?,
icerik = ?,
onay = ?');

$ekle = $sorgu ->execute([
    $baslik, $icerik, $onay
]);

if ($ekle){
    header('Location:index.php');
    echo 'verileriniz eklendi';
} else{
    $hata = $sorgu ->errorInfo();
    echo 'MySQL Hatası: '.$hata[2]; //2. idexteki hatayı ekrana yazdırır
        }
    }

}

?>

<!-- Kullanıcıdan verileri aldığımız bir form oluşturacaz -->
<form action="" method="post">

    Başlık: <br>
    <input type="text" value="<?php echo isset($_POST['baslik']) ? $_POST['baslik'] : null ?>" name="baslik"> <br> <br>

    İçerik: <br>
    <textarea name="icerik" cols="30" rows="10" value="<?php echo isset($_POST['icerik']) ? $_POST['icerik'] : null ?>"</textarea> <br> <br>

    Onay: <br>
    <select name="onay" >
        <option value="1">Onaylı</option>
        <option value="0">Onaylı Değil</option>

    </select> <br> <br>

    <input type="hidden" name="submit" value="1">
    <button type="submit">Gönder</button>
</form>
