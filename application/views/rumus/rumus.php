<script>
    function sumsks(a) {

        var button1 = document.getElementById('1'+a);
        var button2 = document.getElementById('2'+a);
        var button3 = document.getElementById('3'+a);
        var button4 = document.getElementById('4'+a);
        var button5 = document.getElementById('5'+a);
        //var rows = document.getElementById(tableId).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;


        var kul = document.getElementById('kul'+a).value;

            if (button1.checked){
                    var result = parseInt(kul) * parseInt(4)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "A";
                    }
                }else if (button2.checked) {
                    var result = parseInt(kul) * parseInt(3)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "B";
                    }
                }
                if (button3.checked){
                    var result = parseInt(kul) * parseInt(2)/ parseInt(4);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "C";
                    }
                }else if (button4.checked) {
                    var result = parseInt(kul) / (4.0);
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "D";
                    }
                }

                if (button5.checked){
                    var result = 0;
                    if (!isNaN(result)) {
                        document.getElementById('total'+a).value = result.toFixed(2);
                        document.getElementById('jawab'+a).value = "E";
                    }
                }         
    }

</script>