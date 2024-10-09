window.onload = function() {
    document.getElementById('cep').addEventListener('focusout', () => {
        console.log('onfocusout');
        let cep = document.getElementById('cep').value.replace(/\D/g, '');
        if (cep) {
            let validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                document.getElementById('cep').style.borderColor = 'green';

                fetch(`https://viacep.com.br/ws/${cep}/json/`).then(function (response) {
                    if (!response.ok) {
                        alert('CEP não encontrado.');
                        return false;
                    }
                    response.json().then(function (retorno) {
                        if (retorno) {
                            if (!('erro' in retorno)) {
                                document.querySelector('#logradouro').value= retorno?.logradouro ?? '';
                                document.querySelector('#complemento').value= retorno?.complemento ?? '';
                                document.querySelector('#bairro').value= retorno?.bairro ?? '';
                                document.querySelector('#localidade').value= retorno?.localidade ?? '';
                                document.querySelector('#uf').value= retorno?.uf ?? '';
                                document.querySelector('#ibge').value= retorno?.ibge ?? '';
                            } else {
                                alert('CEP não encontrado.');
                                limpaFormulario();
                            }
                        } else {
                            alert('CEP não encontrado.');
                            limpaFormulario();
                        }
                    });
                });

            } else {
                document.getElementById('cep').style.borderColor = 'red';
                limpaFormulario();
            }
        }
    })
}

function limpaFormulario() {
    document.querySelector('#logradouro').value = '';
    document.querySelector('#complemento').value = '';
    document.querySelector('#bairro').value = '';
    document.querySelector('#localidade').value = '';
    document.querySelector('#uf').value = '';
    document.querySelector('#ibge').value = '';
}


document.getElementById('cep-form')?.addEventListener('submit', (e) => {
    e.preventDefault();
    let cep = document.querySelector('#cep').value;
    let logradouro = document.querySelector('#logradouro').value;
    let complemento = document.querySelector('#complemento').value;
    let bairro = document.querySelector('#bairro').value;
    let localidade = document.querySelector('#localidade').value;
    let uf = document.querySelector('#uf').value;
    let ibge = document.querySelector('#ibge').value;

    let options = {
        method : 'POST',
        headers: window.ajax_headers,
        body   : JSON.stringify({
            cep,
            logradouro,
            complemento,
            bairro,
            localidade,
            uf,
            ibge
        })
    }

    fetch(`./register-cep`, options).then(function (response) {
        if (!response.ok) {
            alert('Erro ao cadastrar dados. Tente novamente.');
            return false;
        }
        response.json().then(function (retorno) {
            if (retorno) {
                alert(retorno.message)
            } else {
                alert("Erro ao cadastrar dados. Tente novamente.");
            }
        });
    });
})
