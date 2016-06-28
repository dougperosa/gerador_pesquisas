function alternaPerguntas(questao, alternarpara) {
    var novaquestao = null;
    var exige = null;
    var preenche = null;
    if (alternarpara.toString() == 'proxima') {
        exige = exigeConsideracoes(questao);
        preenche = respostaBranco(questao);
        if (exige == true) {
            alert('Necessário preencher as considerações dessa questão! (No caso de marcar de 1 à 6)');
        } else if (preenche == true) {
            alert('Necessário preencher alguma opção de resposta!');
        } else {
            novaquestao = questao + 1;
            document.getElementById('questao' + questao.toString()).style.display = 'none';
            document.getElementById('questao' + questao.toString()).style.height = '0px';
            document.getElementById('questao' + novaquestao.toString()).style.display = 'block';
        }
    } else {
        novaquestao = questao - 1;
        document.getElementById('questao' + questao.toString()).style.display = 'none';
        document.getElementById('questao' + questao.toString()).style.height = '0px';
        document.getElementById('questao' + novaquestao.toString()).style.display = 'block';
    }
}

function validaConfirmacao() {
    var senha = document.getElementById('senhaCadastro').value;
    var confirmacao = document.getElementById('confirmacao').value;

    if (senha != confirmacao) {
        alert("A confirmação não confere com a senha informada!");
        document.getElementById('senhaCadastro').focus();
    }
}

function exigeConsideracoes(questao) {
    if (document.getElementById(questao + 'consideracoes').value == '' &&
            (document.getElementById(questao + 'resposta1').checked || document.getElementById(questao + 'resposta2').checked
                    || document.getElementById(questao + 'resposta3').checked || document.getElementById(questao + 'resposta4').checked
                    || document.getElementById(questao + 'resposta5').checked || document.getElementById(questao + 'resposta6').checked)) {
        return true;
    } else {
        return false;
    }
}

function respostaBranco(questao) {
    if (document.getElementById(questao + 'resposta1').checked || document.getElementById(questao + 'resposta2').checked
            || document.getElementById(questao + 'resposta3').checked || document.getElementById(questao + 'resposta4').checked
            || document.getElementById(questao + 'resposta5').checked || document.getElementById(questao + 'resposta6').checked
            || document.getElementById(questao + 'resposta7').checked || document.getElementById(questao + 'resposta8').checked
            || document.getElementById(questao + 'resposta9').checked || document.getElementById(questao + 'resposta10').checked
            || document.getElementById(questao + 'respostansa').checked) {
        return false;
    } else {
        return true;
    }
}