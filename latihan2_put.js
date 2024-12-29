const formPut = document.getElementById("put")

formPut.addEventListener("submit", (el) => {
    el.preventDefault();
    sendUpdateValue()
})

async function sendUpdateValue() {
    
    const id = document.getElementById("index").innerText

    const nama = document.getElementById("nama").value
    const umur = document.getElementById("umur").value
    const jenis_kelamin = document.getElementById("jenis_kelamin").value

    await fetch("http://localhost:3000/latihan2_put.php?id="+id, {
        method : "PUT",
        headers : {
            "Content-Type": "application/json"
        },
        body : JSON.stringify({
            nama : nama,
            umur : umur,
            jenis_kelamin : jenis_kelamin
        })
    })

    alert("Data Berhasil Terupdate")
    

}