var tela = $("#secao_input_dinamica")
async function inputSingle(str) {
    switch (str) {
        case 'tecnologias':
            typeTecnologias()
            break;
        case 'projetos':
            await typeProjetos()
            break;
        case 'experiencias':
            await typeExperiencia()
            break;
        case 'detalhes_cursos':
            await typeDetalhesCursos()
            break;
        case 'cursos':
            typeCursos()
            break;
        default:
            break;
    }
}


function typeTecnologias() {
    tela.empty()
    let telaTecnologia = `
    <div class="card">
        <h2 class="text-center card-header">Tecnologia</h2>
        <div class="container">
            <div class="card-body">
                <div class="mb-3">
                    <form id="formtecnologia">
                        <input id="nome_tecnologia" type="text" class="form-control mb-3 col-12" placeholder="Tecnologia..." aria-label="Nome" aria-describedby="nome-tecnologia">
                        <input id="descricao_tecnologia" type="text" class="form-control col-12 mb-3" placeholder="Descrição da tecnologia" aria-label="Descrição tecnologia" aria-describedby="descricao-tecnologia">
                        <button type="button" onclick="AdicionarInput('tecnologia')" class="btn btn-primary mt-2">Adicionar categoria</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    `

    tela.append(telaTecnologia)
}

async function typeProjetos() {
    tela.empty()
    let telaProjetos = `
    <div class="card">
        <h2 class="text-center card-header">Projetos</h2>
        <div class="container">
            <div class="card-body">
                <div class="mb-3">
                    <form id="formprojeto">
                        <input type="text" id="nome_projeto" class="form-control mb-3 col-12" placeholder="Nome do projeto..." aria-label="Nome projeto" aria-describedby="nome-projeto">
                        <input type="text" id="descricao_projeto" class="form-control col-12 mb-3" placeholder="Descrição do projeto..." aria-label="Descrição projeto" aria-describedby="descricao-projeto">
                        <select class="form-select mb-3" id="tecnologia_projetos" multiple>
                        <option selected>Sem tecnologia</option>`
                        let tecnologias = await checkboxTecnologias();
                        tecnologias.map(e=>{
                            telaProjetos+=`<option value="${e.id}">${e.nome}</option>`
                        })
                        telaProjetos+=`</select>
                        <input type="text" id="link_repositorio" class="form-control col-12 mb-3" placeholder="Link repositório" aria-label="Link repositório" aria-describedby="link-repositorio">
                        <input type="text" id="link_servidor" class="form-control col-12 mb-3" placeholder="Link servidor" aria-label="Link servidor" aria-describedby="link-servidor">
                        <button type="button" onclick="AdicionarInput('projetos')" class="btn btn-primary mt-2">Adicionar categoria</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    `

    tela.append(telaProjetos)
}

async function typeExperiencia() {
    tela.empty()
    let telaExperiencia = `
    <div class="card">
        <h2 class="text-center card-header">Experiências</h2>
        <div class="container">
            <div class="card-body">
                <div class="mb-3">
                    <form id="formexperiencia">
                        <input type="text" id="nome_experiencia" class="form-control mb-3 col-12" placeholder="Nome para experiência..." aria-label="Tecnologia" aria-describedby="experiencia">
                        <input type="date" id="data_ini_experiencia" class="form-control mb-3 col-12" aria-label="Data Inicio" aria-describedby="data_inicio">
                        <input type="date" id="data_fim_experiencia" class="form-control mb-3 col-12" aria-label="Data Fim" aria-describedby="data-fim">
                        <input type="text" id="empresa_experiencia" class="form-control mb-3 col-12" placeholder="Empresa" aria-label="Empresa" aria-describedby="empresas">
                        <input type="text" id="funcao_experiencia" class="form-control mb-3 col-12" placeholder="Função" aria-label="Função" aria-describedby="funcao">
                        <input type="text" id="descricao_experiencia" class="form-control mb-3 col-12" placeholder="Descrição" aria-label="Descrição" aria-describedby="descricao">
                        <input type="text" id="tecnologia_experiencia" class="form-control mb-3 col-12" placeholder="Tecnologia(s)" aria-label="Tecnologia" aria-describedby="tecnologia">
                        <select class="form-select mb-3" id="selectTecnologias" multiple>
                        <option selected>Sem tecnologia</option>`
                        let tecnologias = await checkboxTecnologias();
                        tecnologias.map(e=>{
                            telaExperiencia+=`<option value="${e.id}">${e.nome}</option>`
                        })
                        telaExperiencia+=`</select>
                        <button type="button" onclick="AdicionarInput('experiencia')" class="btn btn-primary mt-5">Adicionar categoria</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    `

    tela.append(telaExperiencia)
}

async function typeDetalhesCursos() {
    tela.empty()
    let telaDetalheCursos = `
    <div class="card">
        <h2 class="text-center card-header">Detalhes dos cursos</h2>
        <div class="container">
            <div class="card-body">
                <div class="mb-3">
                    <form id="formdetalhecurso">
                    <select class="form-select mb-3" id="select_cursos_detalhes" multiple>
                    <option selected>Sem cursos</option>`
                    let cursos = await checkboxCursos();
                    cursos.map(e=>{
                        telaDetalheCursos+=`<option value="${e.id}">${e.nome}</option>`
                    })
                    telaDetalheCursos+=`</select>
                        <input type="text" id="nome_det_curso" class="form-control mb-3 col-12" placeholder="Nome" aria-label="Nome" aria-describedby="button-tencologia">
                        <select class="form-select mb-3" id="selectTecnologias" multiple>
                        <option selected>Sem tecnologia</option>`
                        let tecnologias = await checkboxTecnologias();
                        tecnologias.map(e=>{
                            telaDetalheCursos+=`<option value="${e.id}">${e.nome}</option>`
                        })
                        telaDetalheCursos+=`</select>
                        <input type="text" id="descricao_det_curso" class="form-control mb-3 col-12" placeholder="Descrição..." aria-label="Descrição" aria-describedby="button-tencologia">
                        <input type="text" id="link_certificado_det_curso" class="form-control col-12" placeholder="Link certificado" aria-label="Link do certificado" aria-describedby="button-tencologia">
                        <button type="button" onclick="AdicionarInput('detalhes_cursos')" class="btn btn-primary mt-5">Adicionar categoria</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    `

    tela.append(telaDetalheCursos)
}

function typeCursos() {
    tela.empty()
    let telaCursos = `
    <div class="card">
        <h2 class="text-center card-header">Cursos</h2>
        <div class="container">
            <div class="card-body">
                <div class="mb-3">
                    <form id="formcurso">
                        <input type="text" id="nome_curso" class="form-control mb-3 col-12" placeholder="Nome do curso..." aria-label="Tecnologia" aria-describedby="button-tencologia">
                        <input type="date" id="data_curso" class="form-control mb-3 col-12" aria-label="Data curso" aria-describedby="button-tencologia">
                        <input type="text" id="plataforma_estudo" class="form-control mb-3 col-12" placeholder="Plataforma de estudo..." aria-label="Tecnologia" aria-describedby="button-tencologia">
                        <input type="text" id="link_certificado" class="form-control col-12" placeholder="Link do certificado" aria-label="Tecnologia" aria-describedby="button-tencologia">
                        <button type="button" onclick="AdicionarInput('cursos')" class="btn btn-primary mt-5">Adicionar categoria</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    `

    tela.append(telaCursos)
}

async function checkboxCursos() {
    try {
        let response = await fetch("../backend/cursos_select.php")
        const res = await response.json()
        let dados = []
        if(res){
            res.forEach(element => {
                dados.push(element)
            })
        }
        return dados;  
    }catch(err) {
        console.error("Erro: ",err)
        throw err;
    }
}

async function checkboxTecnologias (){
    try {
        let response = await fetch("../backend/tecnologias_select.php")
        const res = await response.json()
        let dados = []
        if(res){
            res.forEach(element => {
                dados.push(element)
            })
        }
        return dados;  
    }catch(err) {
        console.error("Erro: ",err)
        throw err;
    }
}

function selectMultiplesTecnologias(res) {
    return ""
}

function AdicionarInput(str) {

    
    if(str === "tecnologia"){
        let nome_tecnologia = $("#nome_tecnologia").val()
        let descricao_tecnologia = $("#descricao_tecnologia").val()
        console.log(nome_tecnologia,descricao_tecnologia)

            let obj = {
                "nome_tecnologia": nome_tecnologia,
                "descricao_tecnologia": descricao_tecnologia
            }

        fetch("../backend/insert_values.php",
        {
            method:"POST",
            body:JSON.stringify(obj),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(result => {
            console.log(result)
        })
        .catch(error => console.error("Erro: "+error))
        
        nome_tecnologia.val("Enviado")
        descricao_tecnologia.val("")
    }
    if(str === "projetos"){

        let nome_projeto = $("#nome_projeto").val()
        let descricao_projeto = $("#descricao_projeto").val()
        let link_repositorio = $("#link_repositorio").val()
        let tecnologia_projetos = $("#tecnologia_projetos").val()
        let link_servidor = $("#link_servidor").val()
        console.log(nome_projeto,descricao_projeto,link_repositorio,link_servidor)
        let obj = {

            "nome_projeto": nome_projeto,
            "descricao_projeto": descricao_projeto,
            "link_repositorio": link_repositorio,
            "tecnologia_projetos":tecnologia_projetos,
            "link_servidor": link_servidor,
        }

        fetch("../backend/insert_values.php",
        {
            method:"POST",
            body:JSON.stringify(obj),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(result => console.log(result))
        .catch(error => console.error("Erro: "+error))
    }
    if(str === "experiencia"){

        let nome_experiencia = $("#nome_experiencia").val()
        let data_ini_experiencia = $("#data_ini_experiencia").val()
        let data_fim_experiencia = $("#data_fim_experiencia").val()
        let empresa_experiencia = $("#empresa_experiencia").val()
        let funcao_experiencia = $("#funcao_experiencia").val()
        let descricao_experiencia = $("#descricao_experiencia").val()
        let tecnologia_experiencia = $("#tecnologia_experiencia").val()
        console.log(nome_experiencia,data_ini_experiencia,data_fim_experiencia,empresa_experiencia,funcao_experiencia,descricao_experiencia,tecnologia_experiencia)
            let obj = {

                "nome_experiencia": nome_experiencia,
                "data_ini_experiencia": data_ini_experiencia,
                "data_fim_experiencia": data_fim_experiencia,
                "empresa_experiencia": empresa_experiencia,
                "funcao_experiencia": funcao_experiencia,
                "descricao_experiencia": descricao_experiencia,
                "tecnologia_experiencia": tecnologia_experiencia,
            }

        fetch("../backend/insert_values.php",
        {
            method:"POST",
            body:JSON.stringify(obj),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(result => console.log(result))
        .catch(error => console.error("Erro: "+error))
    }
    if(str === "detalhes_cursos"){
        let id_curso = $("#select_cursos_detalhes").val()
        let nome_det_curso = $("#nome_det_curso").val()
        let tecnologia_det_curso = $("#tecnologia_det_curso").val()
        let descricao_det_curso = $("#descricao_det_curso").val()
        let link_certificado_det_curso = $("#link_certificado_det_curso").val()
        console.log(nome_det_curso,tecnologia_det_curso,descricao_det_curso,link_certificado_det_curso)
        let obj = {
            "id_curso":id_curso,
            "nome_det_curso": nome_det_curso,
            "tecnologia_det_curso": tecnologia_det_curso,
            "descricao_det_curso": descricao_det_curso,
            "link_certificado_det_curso": link_certificado_det_curso
        }

        fetch("../backend/insert_values.php",
        {
            method:"POST",
            body:JSON.stringify(obj),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(result => console.log(result))
        .catch(error => console.error("Erro: "+error))
    }
    if(str === "cursos"){
        let nome_curso = $("#nome_curso").val()
        let data_curso = $("#data_curso").val()
        let plataforma_estudo = $("#plataforma_estudo").val()
        let link_certificado = $("#link_certificado").val()

        let obj = {
            "nome_curso": nome_curso,
            "data_curso": data_curso,
            "plataforma_estudo": plataforma_estudo,
            "link_certificado": link_certificado
        }

        fetch("../backend/insert_values.php",
        {
            method:"POST",
            body:JSON.stringify(obj),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(result => console.log(result))
        .catch(error => console.error("Erro: "+error))
        
    }
}