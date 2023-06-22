<form name="perfilForm" id="perfilForm" method="POST" action="../Controller/pacienteControl.php">
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" value="<?php if(isset($usuario['nome'])) { echo $usuario['nome']; } else echo "";  ?>" required>

        <label for="pai">Nome do Pai:</label>
        <input type="text" id="pai" name="pai" value="<?php if(isset($usuario['pai'])) { echo $usuario['pai']; } else echo "";  ?>" required>

        <label for="mae">Nome da Mãe:</label>
        <input type="text" id="mae" name="mae" value="<?php if(isset($usuario['mae'])) { echo $usuario['mae']; } else echo "";  ?>" required>

        <label for="dt_nasc">Data de Nascimento:</label>
        <input type="date" id="dt_nasc" name="dt_nasc" value="<?php if(isset($usuario['dt_nasc'])) { echo $usuario['dt_nasc']; } else echo "";  ?>" required>

        <label for="raca">Raça:</label>
        <input type="text" id="raca" name="raca" value="<?php if(isset($usuario['raca'])) { echo $usuario['raca']; } else echo "";  ?>" required>

        <label for="address">Endereço:</label>
        <input type="text" id="address" name="address" value="<?php if(isset($usuario['endereco'])) { echo $usuario['endereco']; } else echo "";  ?>"required>

        <label for="RG">RG:</label>
        <input type="text" id="RG" name="RG" value="<?php if(isset($usuario['rg'])) { echo $usuario['rg']; } else echo "";  ?>" required>

        <label for="CPF">CPF:</label>
        <input type="text" id="CPF" name="CPF" value="<?php if(isset($usuario['cpf'])) { echo $usuario['cpf']; } else echo "";  ?>" required>

        <label for="Nacionalidade">Nacionalidade:</label>
        <input type="text" id="naci" name="naci" value="<?php if(isset($usuario['nacionalidade'])) { echo $usuario['nacionalidade']; } else echo "";  ?>" required>

        <label for="Naturalidade">Naturalidade:</label>
        <input type="text" id="natu" name="natu" value="<?php if(isset($usuario['naturalidade'])) { echo $usuario['naturalidade']; } else echo "";  ?>" required>

        <select name="sexo" value="<?php if(isset($usuario['sexo'])) { echo $usuario['sexo']; } else echo "";  ?>">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>

        <button type="submit">Salvar</button>
    </form>