// Função para verificar se o usuário está autenticado
function verificarAutenticacao() {
    // Verifica se o usuário está no localStorage
    const usuarioAutenticado = localStorage.getItem('usuario_autenticado');

    if (!usuarioAutenticado) {
        // Se não estiver autenticado, redireciona para a página de login
        window.location.href = 'login.php';
    }
}

// Executa a verificação de autenticação em páginas protegidas
verificarAutenticacao();
