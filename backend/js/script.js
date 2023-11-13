function IniciarApp(){
    efeitoHover()
}

function efeitoHover() {
    let itensClicaveis = document.querySelectorAll('.list-group-item')
    itensClicaveis.forEach((e)=> {
        e.addEventListener('click', () => {
            let elementActived = document.querySelectorAll('.isActived')
            if(elementActived.length > 0 ){
                elementActived.forEach((text)=> text.classList.remove('isActived'))
            }
            
            e.classList.add('isActived')
        })
    })
}

function mostrarSenha(){
    let senhaoculta = $("#senha_oculta")
    let senhavisivel = $("#senha_visivel")
    let senha = $("#senha_login")
    senhaoculta.css({
        "display":"none",
        "transition":"0.5s"
    })
    senhavisivel.css({
        "display":"inline"
    })

    senha.attr("type","text")
}

function ocultarSenha(){
    let senhaoculta = $("#senha_oculta")
    let senhavisivel = $("#senha_visivel")
    let senha = $("#senha_login")
    senhaoculta.css({
        "display":"inline",
        "transition":"0.5s"
    })
    senhavisivel.css({
        "display":"none"
    })

    senha.attr("type","password")
}