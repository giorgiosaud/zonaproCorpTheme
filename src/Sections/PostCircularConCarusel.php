<?php 
namespace jorgelsaud\ZonaproCorpTheme\Sections;
use jorgelsaud\ZonaproCorpTheme\CustomPosts;
class PostCircularConCarusel{
	public function __construct(){
		$this->titulo = get_sub_field('titulo');
		$this->subtitulo = get_sub_field('subtitulo');
		$this->tipoDePost = get_sub_field('tipo_de_post');
		$this->cantiad = get_sub_field('cantidad_de_posts');
		$this->orderBy=get_sub_field('orderBy');
		$rand=null;
		$this->id= str_replace(' ', '', $this->titulo);
		if($this->orderBy==true){
		$rand='rand';
		}
		if(get_sub_field('mostrar_todos')){
			$this->cantidad=-1;
		}
		$this->posts=CustomPosts::getPosts($this->tipoDePost,$this->cantiad,$length,null,$rand);
		echo $this->show();
	}
	public function show(){
		ob_start()?>
		<div class="PostCirculares">
			<div class="PostCirculares__Titulo">
				<?= $this->titulo ?>
			</div>
			<div class="PostCirculares__Subtitulo">
				<?= $this->subtitulo ?>
			</div>
			<div class="PostCarusel">
				<?php foreach($this->posts as $index=>$post): ?>
				<div class="PostCircular__Carusel__Item">
					<div class="PostCircular__Item__Imagen">
						<img src="<?= $post['imagen_circular']?>" alt="Imagen Circular">
					</div>
					<div class="PostCircular__Item__Titulo">
						<?php echo apply_filters( 'the_title', $post['title'])?>
					</div>
					<div class="PostCircular__Item__Resumen">
						<?php echo apply_filters( 'the_title', $post['resumen']) ?>
					</div>
					<a href="<?=$post['link']?>" target="_blank" class="btn PostCircular__Item__Boton btn-default"><?php _e('Ver Mas','zonaprocorptheme')?></a>	
				</div>
				<?php endforeach?>
			</div>
		</div>
<?php
			return ob_get_clean();
	}
}
?>