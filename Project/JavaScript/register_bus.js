var x = 0;

function addInput() {
    var str = '<div class="inp"><input type="text" class="form-control" name="name[]" placeholder="Wpisz nazwę przystanku"> <input type="text" class="form-control w-25" name="price[]" placeholder="Cena"></div></br> <div id="input' + (x + 1) + '"></div>';
    document.getElementById('input' + x).innerHTML = str;
	x++;
}