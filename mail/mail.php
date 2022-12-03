<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/mail.css">
    <title>Mail - <?php echo $_SESSION['Pseudo'] ?></title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <form name="f" method="post" action="send.php" enctype="multipart/form-data">
        <div>
            <input type="text" class="chank" name="res" placeholder="À">
            <input type="text" class="chank" name="cc" placeholder="Cc">    
            <input type="text" class="chank" name="cci" placeholder="Cci">
            <input type="text" class="chank" name="obj" placeholder="Object">
            <textarea name="msg" class="msg"></textarea>
        </div>
        <div class="bottombar">
            <input type="submit" class="send btn" value="send">
            <label>
                <input type="file" name="inpfile" style="display: none;"  id="inpfile" multiple/>
                Add piece joint
            </label>
            <!--img src="images/trash-bin.png" alt="bin" id="delbtn" title="click to delete selected items" style="float: right;height: 80%;margin: 4px;"-->
            <div id="filesicons"style="float: right;height: 80%;margin: 4px;"></div>
        </div>
    </form>
    <script>
        $(document).ready(reffile);
        //document.getElementById('delbtn').addEventListener("click", deleteFiles);

        function hasExtension(fileName, exts) {
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
        function addBorder(fileImge, id){
            if(document.getElementById(id).style.borderBottom != "0.5px solid red"){
                fileImge.style = "float: right;height: 80%;margin: 4px;border: 0.5px solid red;border-radius: 8px;";
            }else{
                fileImge.style = "float: right;height: 80%;margin: 4px;";
            }
        }
        
        function reffile(){
            console.log('-------');
            $('input[type="file"]').change(function(e){
                const input = document.getElementById('inpfile');
                console.log(input.files)
                for (let i = 0; i < e.target.files.length; i++) {
                    let file = e.target.files[i];
                    if(hasExtension(file.name, ['.jpg'])){
                        document.getElementById('filesicons').innerHTML += (
                            '<img src="images/jpg.png" alt="bin" onclick="addBorder(this, ' + i + ')" id="' + i + '" title=' + file.name + ' style="float: right;height: 80%;margin: 4px;">'
                        );
                    }else if(hasExtension(file.name, ['.png'])){
                        document.getElementById('filesicons').innerHTML += (
                            '<img src="images/png.png" alt="bin" onclick="addBorder(this, ' + i + ')" id="' + i + '" title=' + file.name + ' style="float: right;height: 80%;margin: 4px;">'
                        );
                    }else if(hasExtension(file.name, ['.csv'])){
                        document.getElementById('filesicons').innerHTML += (
                            '<img src="images/csv.png" alt="bin" onclick="addBorder(this, ' + i + ')" id="' + i + '" title=' + file.name + ' style="float: right;height: 80%;margin: 4px;">'
                        );
                    }else if(hasExtension(file.name, ['.zip', '.rar'])){
                        document.getElementById('filesicons').innerHTML += (
                            '<img src="images/zip.png" alt="bin" onclick="addBorder(this, ' + i + ')" id="' + i + '" title=' + file.name + ' style="float: right;height: 80%;margin: 4px;">'
                        );
                    }else{
                        document.getElementById('filesicons').innerHTML += (
                            '<img src="images/new-document.png" onclick="addBorder(this, ' + i + ')" id="' + i + '" title=' + file.name + ' alt="bin" style="float: right;height: 80%;margin: 4px;">'
                        );
                    }
                }
            }
            
            );
        }
        function clearFileInput(ctrl) {
            try {
                ctrl.value = null;
            } catch(ex) { }
            if (ctrl.value) {
                ctrl.parentNode.replaceChild(ctrl.cloneNode(true), ctrl);
            }
        }
        /*function deleteFiles(){
            const dt = new DataTransfer()
            const input = document.getElementById('inpfile');
            const { files } = input;
            console.log(input.files)
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if(document.getElementById(i).style.borderBottom != "0.5px solid red"){
                    dt.items.add(file);
                }
            }
            input.files = dt.files;
            console.log(input.files)
            clearFileInput(document.getElementById("inpfile"));
        }*/
    </script> 
</body>
</html>
<!--

    border: 0.5px solid red;border-radius: 8px; 



-->