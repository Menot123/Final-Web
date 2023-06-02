const $1 = document.getElementById.bind(document)
const dateS = $1('dateS')
const dateE = $1('dateE')
const idRoom = $1('idRoom')
const numPeople = $1('numPeople')
const nameRoom = $1('nameRoom')
const price1 = $1('price')
const formBookRoom = $1('formBookRoom')
const bf = $1('bf')

// const breakfast = $1('breakfast')

$('#btnBook').click(function() {
    const service = this.parentNode;
    const breakfast = service.children[2].children[1].children[1];
    if(breakfast.checked) {
        bf.value = "check";
    }else{
        bf.value = "none";
    }

   
});

function GoBookRoom(that,d1,d2,id,people,name,price) {
    dateS.value = d1
    dateE.value = d2
    idRoom.value = id
    numPeople.value = people
    nameRoom.value = name

    const service = that.parentNode;
    const breakfast = service.children[2].children[1].children[1];
    if(breakfast.checked) {
        bf.value = "check";
        price = price.replace(" VND","")
        price = price.replaceAll(".","")
        price = parseInt(price) + 600000
    }else{
        bf.value = "none";
        price = price.replace(" VND","")
        price = price.replaceAll(".","")
        price = parseInt(price)
    }
    price1.value = price
    
    formBookRoom.submit();
}



