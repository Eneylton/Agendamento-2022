const cadform = document.getElementById("insert-alunos-form"); 

async function listarAlunos(id_cat){
    const dadosProd = await fetch('aluno-list.php?id_cat=' + id_cat);
    const respostaProd = await dadosProd.json();
  
    const listarAlunosModal = new bootstrap.Modal(document.getElementById("listarAlunosModal"));
    listarAlunosModal.show();
    document.querySelector(".listar-alunos").innerHTML = respostaProd['dados'];
    
 
}

cadform.addEventListener("submit",async (e)=>{
    e.preventDefault();
    const dadosForm = new FormData(cadform);
   
    const dados = await fetch("aluno-instrutor-insert.php",{
        method: "POST",
        body:dadosForm
    });

    const reposta = await dados.json();
    console.log(reposta);
})


