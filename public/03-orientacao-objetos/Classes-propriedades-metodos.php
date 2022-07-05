<?php 

class Post {
    private string $titulo;
    private DateTime $data;
    private string $corpo;
    private array $comentarios;
    private int $qtdComentarios;
    
    public function getTitulo() 
    {
        return $this->titulo;
    }

    public function setTitulo($titulo) 
    {
        if(is_string($titulo)) {
            return $this->titulo = $titulo;
        }
    }

    public function addComentario($msg)
    {
        $this->comentarios[] = $msg;
        $this->contarComentarios();
    }

    private function contarComentarios() {
        $this->qtdComentarios = count($this->comentarios);
    }

    public function getCountComentarios()
    {
        return $this->qtdComentarios;
    }

}
    $post = new Post();

    $post->addComentario("Teste");
    $post->addComentario("Teste 2");
    $post->addComentario("Teste 3");
    $post->addComentario("Teste 4");

    echo "Quantidade de comentários: ".$post->getCountComentarios();
?>