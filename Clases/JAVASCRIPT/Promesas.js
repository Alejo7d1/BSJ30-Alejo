console.log("holiwis");

function getCoach(id){
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (id === 1){
                resolve({id: 1,name:"Jairo"});
            }else{
                reject("No se encontro ese coach");
            }
        }, 2000)
    })
}

console.log(getCoach(1));