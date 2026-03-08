<?php
/**
 * Template Name: Página Sobre
 *
 * @package Union_Arquitetura
 */

get_header();
?>

<section class="section" style="padding-top: 10rem;">
    <div class="container">
        <!-- Filosofia + Abordagem -->
        <div class="contact-grid">
            <div>
                <p class="section-label">SOBRE</p>
                <h1 class="section-title" style="margin-bottom: 3rem;">Filosofia de Design</h1>
                
                <p style="font-size: 1.125rem; color: var(--muted-foreground); line-height: 1.8; margin-bottom: 2rem;">
                    Acreditamos que a arquitetura deve melhorar a experiência humana enquanto respeita 
                    o ambiente natural. Nossa prática foca em criar espaços que são 
                    funcionais e poéticos.
                </p>
                
                <p style="font-size: 1.125rem; color: var(--muted-foreground); line-height: 1.8;">
                    Fundada em 2015, a Union completou mais de 200 projetos nos setores 
                    residencial, comercial e cultural. Cada projeto começa com 
                    escuta atenta e termina com execução cuidadosa.
                </p>
            </div>
            
            <div>
                <p class="section-label" style="margin-bottom: 1.5rem;">ABORDAGEM</p>
                
                <div style="margin-bottom: 1.5rem; padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Pesquisa</h4>
                    <p style="color: var(--muted-foreground);">Compreensão profunda de contexto, cultura e clima</p>
                </div>
                
                <div style="margin-bottom: 1.5rem; padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Colaboração</h4>
                    <p style="color: var(--muted-foreground);">Parceria próxima com clientes, engenheiros e artesãos</p>
                </div>
                
                <div style="padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Inovação</h4>
                    <p style="color: var(--muted-foreground);">Materiais sustentáveis e soluções de design inovadoras</p>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                    <div>
                        <p class="section-label">FUNDAÇÃO</p>
                        <p style="font-size: 1.25rem;">2015</p>
                    </div>
                    <div>
                        <p class="section-label">PROJETOS</p>
                        <p style="font-size: 1.25rem;">200+</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Missão e Valores -->
        <div class="contact-grid" style="margin-top: 8rem;">
            <div>
                <p class="section-label" style="margin-bottom: 1.5rem;">MISSÃO</p>
                <p style="font-size: 1.25rem; font-weight: 300; letter-spacing: -0.02em; line-height: 1.3; margin-bottom: 2rem;">
                    Transformar ideias em espaços que elevam a qualidade de vida, unindo estética, funcionalidade e sustentabilidade em cada projeto.
                </p>
                <p style="font-size: 1.125rem; color: var(--muted-foreground); line-height: 1.8;">
                    Buscamos ser referência em arquitetura e engenharia no Brasil, entregando soluções que superam expectativas e geram impacto positivo nas comunidades onde atuamos.
                </p>
            </div>

            <div>
                <p class="section-label" style="margin-bottom: 1.5rem;">VALORES</p>
                
                <div style="margin-bottom: 1.5rem; padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Excelência</h4>
                    <p style="color: var(--muted-foreground);">Compromisso com a mais alta qualidade em cada detalhe, do conceito à entrega final</p>
                </div>
                
                <div style="margin-bottom: 1.5rem; padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Integridade</h4>
                    <p style="color: var(--muted-foreground);">Transparência e ética em todas as relações com clientes, parceiros e comunidade</p>
                </div>
                
                <div style="margin-bottom: 1.5rem; padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Sustentabilidade</h4>
                    <p style="color: var(--muted-foreground);">Responsabilidade ambiental integrada a cada decisão projetual</p>
                </div>
                
                <div style="padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Humanização</h4>
                    <p style="color: var(--muted-foreground);">Pessoas no centro de tudo — projetamos para viver, não apenas para construir</p>
                </div>
            </div>
        </div>

        <!-- Nosso Time -->
        <div style="margin-top: 8rem;">
            <p class="section-label" style="margin-bottom: 1.5rem;">NOSSO TIME</p>
            <h2 class="section-title" style="margin-bottom: 4rem;">As pessoas por trás dos projetos</h2>

            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 2.5rem;">
                <?php
                $team_members = array(
                    array('name' => 'Carlos Mendes', 'role' => 'Arquiteto Fundador', 'desc' => '20 anos de experiência em projetos residenciais e comerciais de alto padrão'),
                    array('name' => 'Ana Beatriz Lima', 'role' => 'Engenheira Estrutural', 'desc' => 'Especialista em estruturas complexas e soluções construtivas sustentáveis'),
                    array('name' => 'Rafael Torres', 'role' => 'Arquiteto de Interiores', 'desc' => 'Design de interiores com foco em funcionalidade e bem-estar dos ocupantes'),
                    array('name' => 'Juliana Costa', 'role' => 'Gestora de Projetos', 'desc' => 'Coordenação e execução de obras com excelência em prazo e qualidade'),
                );
                foreach ($team_members as $member) :
                ?>
                <div style="max-width: 75%; text-align: center; margin: 0 auto;">
                    <div style="aspect-ratio: 3/4; background: var(--muted); margin-bottom: 1.25rem;"></div>
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.25rem;"><?php echo esc_html($member['name']); ?></h4>
                    <p class="section-label" style="margin-bottom: 0.75rem;"><?php echo esc_html($member['role']); ?></p>
                    <p style="font-size: 0.875rem; color: var(--muted-foreground); line-height: 1.6;"><?php echo esc_html($member['desc']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
