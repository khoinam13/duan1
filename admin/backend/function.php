<?php
// hàm
// thông báo
function messenger($id){

    if (isset($_GET["messenger-err"]) || isset($_GET["messenger-success"])) {
        if(isset($_GET["messenger-err"]) && isset($_GET["messenger-success"])){
            $messengerErr = $_GET["messenger-err"];
            $messengerSuccess = $_GET["messenger-success"];
            echo "
                    <script>
                    document.getElementById('$id').innerHTML = '$messengerErr';
                    document.getElementById('$id').classList.add('err');
                    document.getElementById('$id').innerHTML = '$messengerSuccess';
                    document.getElementById('$id').classList.add('success');
                    </script>
                    ";
        }
        else if (isset($_GET["messenger-err"])) {
            $messengerErr = $_GET["messenger-err"];
            echo "
                    <script>
                    document.getElementById('$id').innerHTML = '$messengerErr';
                    document.getElementById('$id').classList.add('err');
                    </script>
            ";
        } 
        else{
            $messengerSuccess = $_GET["messenger-success"];
            echo "
                <script>
                document.getElementById('$id').innerHTML = '$messengerSuccess';
                document.getElementById('$id').classList.add('success');
                </script>
                ";
        }     
    };
}
// Trả về value khi nhập sai

function backValue($id, $value)
{
    if (isset($_GET[$value])) {
        $value = $_GET[$value];
        echo "
        <script>
        document.getElementById('$id').value = '$value'
        </script>
        ";
    };
}
