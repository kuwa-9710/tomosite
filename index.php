<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tomoSite
 */

get_header();
?>

<main id="primary wrapper" class="site-main">

	<div class="main-visual container">
		<div class="bigtitle">
			<h1 class="font-lg mb-sm animate__animated animate__fadeInLeft">Hi I'm Tomoya.<br>
				Welcome to my Site.</h1>
			<p class="subtitle font-md mb-lg  animate__animated animate__fadeInLeft animate__delay-1s">私は仙台に住む、<span>Webデザイナー</span>です。<span>モダンなデザイン</span>を得意としており、デザインからコーディングまで行います。<br>
				お仕事のご依頼は以下からお願いします。</p>
			<button onclick="location.href='<?php echo get_page_link(28); ?>'" class="btn animate__animated animate__fadeInLeft animate__delay-1s">Contact Me!</button>
		</div>
		<div class="fluid"></div>
	</div>

	<div id="about" class="pt-lg border-top">
		<div class="about container pb-lg contentbox fadeInLeftTrigger">
			<span class="subheading blue">About Me</span>
			<h2 class="mdtitle">Tomoya Kuwashima.</h2>
			<p class="subtitle">こんにちは。私は仙台に住む<span>フリーランスWebデザイナー</span>として活動をしています。文系大学に在籍しておりますが、独学でWebデザインを身につけました。他にはオウンドメディアも運営していますのでぜひチェックしてみてください。</p>
			<button onclick="location.href='<?php echo get_page_link(37); ?>'" class="btn">Learn More</button>
			<div class="icons">
				<a href="https://github.com/kuwa-9710"><i class="fab fa-github fa-2x"></i></a>
				<a href="https://twitter.com/tomominiblog"><i class="fab fa-twitter fa-2x"></i></a>
				<a href="https://tomominiblog.com"><i class="fas fa-blog fa-2x"></i></a>
			</div>
		</div>
	</div>

	<div id="news">
		<div class="container contentbox pb-sm pt-lg border-top  fadeInLeftTrigger ">
			<span class="subheading">News</span>
			<h2 class="mdtitle mb-sm">新着情報</h2>
			<?php
			$args = [
				'post_type' => 'news', 
				'posts_per_page' => 5, // 表示する数
			];
			$my_query = new WP_Query($args); ?>
			<?php if ($my_query->have_posts()) : // 投稿がある場合 
			?>

				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<!-- ▽ ループ開始 ▽ -->
					<p><?php the_time(get_option('date_format')); ?> : <a class="newstitle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				<?php endwhile; ?>

			<?php else : // 投稿がない場合
			?>
				<p>まだ投稿がありません。</p>
			<?php endif;
			wp_reset_postdata(); ?>
		</div>
	</div>

	<div id="skill" class="pt-lg border-top">
		<div class="skills container pb-lg contentbox fadeInLeftTrigger">
			<span class="subheading">Skills</span>
			<h2 class="mdtitle">デザインからコーディングまで全て行います。</h2>
			<p class="subtitle">HTML/CSSでの<span>マークアップ</span>から、javascript/jQueryを使った<span>アニメーション</span>を付与したり、WordPressの<span>オリジナルテーマ</span>を作成します。
				CSSでは、BootstrapやtailwindowなどのライブラリーとSassを利用して効率的に装飾ができます。</p>
			<button onclick="location.href='<?php echo get_page_link(42); ?>'" class="btn">Learn More</button>
		</div>
	</div>

	<div id="tool" class="mb-lg fadeInLeftTrigger pt-lg border-top">
		<div class="container">
			<span class="subheading">Tools</span>
			<h3>使用ツール</h3>
			<div class="tool">
				<div class="toolbox">
					<i class="fab fa-figma fa-4x"></i>
					<p>Figma</p>
				</div>
				<div class="toolbox">
					<i class="fas fa-code fa-4x"></i>
					<p>VSCode</p>
				</div>
				<div class="toolbox">
					<i class="fab fa-github fa-4x"></i>
					<p>Github</p>
				</div>
			</div>
		</div>
	</div>

	<div id="work">
		<div class="workbox pt-lg border-top">
			<div class="container">
				<div class="works pb-lg contentbox fadeInLeftTrigger">
					<span class="subheading">Works</span>
					<h2 class="mdtitle">見えないところまで丁寧に。がモットーです。</h2>
					<p class="subtitle">私が好きなAppleの製品は、外見だけでなく中身まで美しく並んでいます。<span>内面の美しさが外見の美しさを支えている</span>と考え、コーディングにおいて綺麗な記述を心がけています。
						ソースコードは<span>GitHub</span>から閲覧することができます。</p>
					<button onclick="location.href='<?php echo get_page_link(39); ?>'" class="btn mb-md">Learn More</button>
				</div>
			</div>
		</div>
		<div class="worksthum pb-lg border-top pt-lg">
			<div class="container">
				<h3 class="heading01 mb-md">制作実績</h3>
				<div class="row">
					<?php query_posts('posts_per_page=6'); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php
							$thumnail_id = get_post_thumbnail_id();
							$data = wp_get_attachment_image_src($thumnail_id, 'full');
							?>
							<div class="thumnailbox mb-sm col col-lg-4 col-md-6 col-12 fadeInUpTrigger">
								<div class="worksimage shadow mb-sm">
									<a href="<?php the_permalink(); ?>" class="thumnail"><img src="<?php echo $data[0]; ?>" alt="サムネイル"></a>
								</div>

							</div>
					<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>



	</div>




	<div class="workflow pt-lg border-top pb-lg">
		<div class="container contentbox fadeInLeftTrigger">
			<span class="subheading">Work Flow</span>
			<h2 class="mdtitle">受注から納品までの流れ</h2>
			<p class="subtitle">以下のページで<span>受注から納品までの流れ</span>をご説明いたします。私自身まだまだ勉強中ですが、しっかりと責任を持って納品させていただきます。</p>
			<button onclick="location.href='<?php echo get_page_link(44); ?>'" class="btn mb-md">Learn More</button>
		</div>
	</div>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
