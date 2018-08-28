var parecer = [];
var contador = 0;
function cadastrarParecer() {
    elementoP = document.getElementById("elementos");
    elementoP.innerHTML ="<p>Selecione o nome da matéria:</p>"
            + "<select id='dis' required name='dis'>"
                + "<option value='' disabled selected>Selecione</option>"
                + "<option value='matematica'>Matemática</option>"
                + "<option value='portugues'>Português</option>"
                + "<option value='ingles'>Inglês</option>"
                + "<option value='ciencias'>Ciências</option>"
                + "<option value='ed_fis'>Educação Física</option>"
                + "<option value='ens_reg'>Ensino Religioso</option>"
                + "<option value='artes'>Artes</option>"
                + "<option value='historia'>História</option>"
                + "<option value='geografia'>Geografia</option>"
            + "</select><br><br><br>"
            + "<p>Selecione a turma: </p>"
            +"<select id='selectTurma' required>"
                + "<option value='' disabled selected>Selecione:</option>"
                + "<option value='161'>161</option>"
                + "<option value='162'>162</option>"
                + "<option value='171'>171</option>"
                + "<option value='172'>172</option>"
                + "<option value='181'>181</option>"
                + "<option value='182'>182</option>"
                + "<option value='191'>191</option>"
            + "</select>"
            + "<br><br><br>"
            + "<p>Digite parecer de letra A:</p> <textarea required maxlenght='900' name='textarea' id='textarea_0'></textarea>"
            + "<br><br><br>"
            + "<p>Digite parecer de letra B:</p> <textarea required maxlenght='900' name='textarea' id='textarea_1'></textarea>"
            + "<br><br><br>"
            + "<p>Digite parecer de letra C:</p> <textarea required maxlenght='900' name='textarea' id='textarea_2'></textarea>"
            + "<br><br><br>"
            + "<p>Digite parecer de letra D:</p> <textarea required maxlenght='900' name='textarea' id='textarea_3'></textarea>"
            + "<br><br><br>"
            + "<p>Digite parecer de letra E:</p> <textarea required maxlenght='900' name='textarea' id='textarea_4'></textarea>"
            + "<br><br><br>"
            + "<input type='submit' value='Enviar' onclick='carregarDados()' class='btn btn-info btn-lg'>";
}
function cadastrarAlunos() {

    elemento = document.getElementById("elementos");

    elemento.innerHTML = "";
    elemento.innerHTML = "<form>"
            +"<p>Nome do aluno:</p> <input type='text' id='nome_aluno' required>"
            +"<br><br><br>"
            + "<p>Selecione Turma:</p>  <select id='selectTurmaAluno' required>"
                + "<option value='' disabled selected>Selecione:</option>"
                + "<option value='161'>161</option>"
                + "<option value='162'>162</option>"
                + "<option value='171'>171</option>"
                + "<option value='172'>172</option>"
                + "<option value='181'>181</option>"
                + "<option value='182'>182</option>"
                + "<option value='191'>191</option>"
            + "</select>"
            + "<br><br><br>"
            + "<p>Série:</p> <input type='text' id='serie' required><br><br><br>"
            + "<p>Professor Regente:</p> <input type='text' id='prof_reg' required><br><br><br>"
            + "<p>Turno:</p> <select id='turno' required>"
                + "<option value='' disabled selected>Selecione:</option>"
                + "<option value='Manhã'>Manhã</option>"
                + "<option value='Tarde'>Tarde</option>"
            + "</select>"
            +"<br><br><br><input type='submit' value='Entrar' id='button' onclick='chamar_a()' class='btn btn-info btn-lg'>'</form>";
}
function chamar_a() {
    turma = document.getElementById("selectTurmaAluno");
    for (a = 0; a <= turma.length; a++) {
        turmaIO = turma.options[a];
        if (turmaIO.selected === true) {
            gravarTurmaA = turmaIO.value;
            break;
        } else {
        }
    }
    serie = document.getElementById("serie").value;
    professor_reg = document.getElementById("prof_reg").value;
    turno = document.getElementById("turno");
    for (p = 0; p <= turno.length; p++) {
        turnoOpt = turno.options[p];
        if (turnoOpt.selected === true) {
            salvarTurno = turnoOpt.value;
            break;
        } else {
        }
    }
    al = document.getElementById("nome_aluno").value;
    remover(al, gravarTurmaA, serie, professor_reg, salvarTurno);
}
function carregarDados() {
    turmaSelect = document.getElementById("selectTurma");
    for (u = 0; u <= turmaSelect.length; u++) {
        turmaT = turmaSelect.options[u];
        if (turmaT.selected === true) {
            gravarTurma = turmaT.value;
            break;
        } else {
        }
    }
    for (i = 0; i <= 4; i++) {
        parecer[i] = document.getElementById("textarea_" + i).value;
    }
    var materia = document.getElementById("dis");
    for (k = 0; k <= materia.length; k++)
    {
        ver = materia.options[k];
        if (ver.selected === true) {
            salvar_m = ver.value;
            break;
        } else {
        }
    }
    if (salvar_m !== "" && parecer[0] !== "" && parecer[1] !== "" && parecer[2] !== "" && parecer[3] !== "" && parecer[4] !== "" && gravarTurma !== "") {
        var ajax = new XMLHttpRequest();
        var url = "../php/cadastrar_parecer.php";
        ajax.open("POST", url, false);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("parecer_1=" + parecer[0] + "&parecer_2=" + parecer[1] + "&parecer_3=" + parecer[2] + "&parecer_4=" + parecer[3] + "&parecer_5=" + parecer[4] + "&materia=" + salvar_m + "&turma=" + gravarTurma);
        alert(ajax.responseText);
    } else {
        alert("Você esqueceu de preencher algum campo!");
    }
}
function remover(nome_a, turmaRemover, serieRemover, professorRemover, turnoRemover) {
    var nome_aluno = nome_a;
    var turmaCadastrar = turmaRemover;
    var serieCadastrar = serieRemover;
    var professorCadastrar = professorRemover;
    var turnoCadastrar = turnoRemover;
    if (nome_aluno !== "" && turmaCadastrar !== "" && serieCadastrar !== "" && professorCadastrar !== "" && turnoCadastrar !== "" && contador <= 9) {
        elemento = document.getElementById("elementos");
        elemento.innerHTML = "";
        elemento.innerHTML = "Aluno(a): <input type='hidden' id='nome' value='" + nome_aluno + "'> " + nome_aluno + "<br><br>"
                + "Turma: <input type='hidden' id='turmaCad' value='" + turmaCadastrar + "'> " + turmaCadastrar + "<br><br>"
                + "Serie: <input type='hidden' id='serieCad' value='" + serieCadastrar + "'> " + serieCadastrar + "<br><br>"
                + "Professor Regente: <input type='hidden' id='profCad' value='" + professorCadastrar + "'> " + professorCadastrar + "<br><br>"
                + "Turno: <input type='hidden' id='turnoCad' value='" + turnoCadastrar + "'> " + turnoCadastrar + "<br><br>"
                + "Selecione o nome da matéria"
                + "<select id='materia'>"
                + "<option value='' disabled selected>Selecione:</option>"
                + "<option id='materia_1' value='matematica'>Matemática</option>"
                + "<option id='materia_2' value='portugues'>Português</option>"
                + "<option id='materia_3' value='ingles'>Inglês</option>"
                + "<option id='materia_4' value='ciencias'>Ciências</option>"
                + "<option id='materia_5' value='ed_fis'>Educação Física</option>"
                + "<option id='materia_6' value='ens_reg'>Ensino Religioso</option>"
                + "<option id='materia_7' value='artes'>Artes</option>"
                + "<option id='materia_8' value='historia'>História</option>"
                + "<option id='materia_9' value='geografia'>Geografia</option>"
                + "</select><br><br>"
                + "<select id='parecer'>"
                + "<option value='' disabled selected>Selecione:</option>"
                + "<option value='A'>A</option>"
                + "<option value='B'>B</option>"
                + "<option value='C'>C</option>"
                + "<option value='D'>D</option>"
                + "<option value='E'>E</option>"
                + "</select><br><br>"
                + "<input type='submit' id='btn' value='Enviar' onclick='chamar_e()'>";
    } else {
        alert("Você esqueceu de preencher algum campo");
        cadastrarAlunos();
    }
}
function textos(){
            var ajax = new XMLHttpRequest();
            var url = "../php/escreverMateria.php";
            ajax.open("POST", url, false);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send();
}
function chamar_e() {
    no = document.getElementById("nome").value;
    turmaC = document.getElementById("turmaCad").value;
    serieC = document.getElementById("serieCad").value;
    professorC = document.getElementById("profCad").value;
    turnoC = document.getElementById("turnoCad").value;
    cadastrar_A(no, turmaC, serieC, professorC, turnoC);
}
function cadastrar_A(nome, turmaA, serieA, professorA, turnoA) {
    aluno = nome;
    turmaFinal = turmaA;
    serieFinal = serieA;
    professorFinal = professorA;
    turnoFinal = turnoA;
    materia = document.getElementById("materia");
    for (i = 0; i <= materia.length; i++) {
        mat = materia.options[i];
        if (mat.selected === true) {
            mate = mat.value;
            break;
        } else {
        }
    }
    parecer = document.getElementById("parecer");
    for (i = 0; i <= parecer.length; i++) {
        par = parecer.options[i];
        if (par.selected === true) {
            pare = par.value;
            break;
        } else {
        }
    }
    if (mate !== "" && pare !== "") {
        if (contador === 0) {
            var ajax = new XMLHttpRequest();
            var url = "../php/cadastrar_aluno.php";
            ajax.open("POST", url, false);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("aluno=" + aluno + "&serie=" + serieFinal + "&turma=" + turmaFinal + "&profReg=" + professorFinal + "&turno=" + turnoFinal + "&materia=" + mate + "&parecer=" + pare + "&contador=" + contador);
            novo_aluno = aluno;
            alert(ajax.responseText);
            contador++;
            remover(aluno, turmaFinal, serieFinal, professorFinal, turnoFinal);
        } else if (contador <= 8 && contador > 0) {
            var ajax = new XMLHttpRequest();
            var url = "../php/cadastrar_aluno.php";
            ajax.open("POST", url, false);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("aluno=" + novo_aluno + "&materia=" + mate + "&parecer=" + pare + "&contador=" + contador);
            alert(ajax.responseText);
            contador++;
            if (contador > 8) {
                var ajax = new XMLHttpRequest();
                var url = "../php/escreverMateria.php";
                ajax.open("POST", url, false);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.send("nome_aluno=" + novo_aluno + "&turma=" + turmaFinal);
                alert("Foram cadastradas 9 materias");
                contador = 0;
                cadastrarAlunos();
            }
            else{
                remover(novo_aluno, turmaFinal, serieFinal, professorFinal, turnoFinal);
            }
        }
    } else {
        alert("Você não escolheu a materia e/ou a letra do parecer!");
        remover(aluno, turmaFinal, serieFinal, professorFinal, turnoFinal);
    }
}
