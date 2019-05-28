<script>
function rumus_praktikum(a) {
    var button1 = document.getElementById('1p'+a);
    var button2 = document.getElementById('2p'+a);
    var button3 = document.getElementById('3p'+a);
    var button4 = document.getElementById('4p'+a);
    var button5 = document.getElementById('5p'+a);
    var kul = document.getElementById('kul_p'+a).value;

        if (button1.checked){
            var result = parseInt(kul) * parseInt(4)/ parseInt(4);
                if (!isNaN(result)) {
                    document.getElementById('total_p'+a).value = result.toFixed(2);
                    document.getElementById('jawab_p'+a).value = "A";
                }
        }else if (button2.checked) {
            var result = parseInt(kul) * parseInt(3)/ parseInt(4);
                if (!isNaN(result)) {
                    document.getElementById('total_p'+a).value = result.toFixed(2);
                    document.getElementById('jawab_p'+a).value = "B";
                }
        }

        if (button3.checked){
            var result = parseInt(kul) * parseInt(2)/ parseInt(4);
                if (!isNaN(result)) {
                    document.getElementById('total_p'+a).value = result.toFixed(2);
                    document.getElementById('jawab_p'+a).value = "C";
                }
        }else if (button4.checked) {
            var result = parseInt(kul) / (4.0);
                if (!isNaN(result)) {
                    document.getElementById('total_p'+a).value = result.toFixed(2);
                    document.getElementById('jawab_p'+a).value = "D";
                }
        }

        if (button5.checked){
            var result = 0;
                if (!isNaN(result)) {
                    document.getElementById('total_p'+a).value = result.toFixed(2);
                    document.getElementById('jawab_p'+a).value = "E";
                }
        }         
    }
</script>