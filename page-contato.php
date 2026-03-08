<?php
/**
 * Template Name: Página de Contato
 *
 * @package Union_Arquitetura
 */

get_header();
?>

<section class="section" style="padding-top: 10rem;">
    <div class="container">
        <div class="contact-grid">
            <div>
                <p class="section-label">ENTRE EM CONTATO</p>
                <h1 style="font-size: clamp(1.875rem, 4vw, 2.25rem); font-weight: 300; letter-spacing: -0.02em; line-height: 1.1; margin-bottom: 3rem;">
                    Vamos Criar Algo<br>Extraordinário
                </h1>
                
                <div class="contact-info">
                    <p class="contact-label">E-MAIL</p>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'eng.luana@unionengenharia.com')); ?>" class="contact-value">
                        <?php echo esc_html(get_theme_mod('contact_email', 'eng.luana@unionengenharia.com')); ?>
                    </a>
                </div>
                
                <div class="contact-info">
                    <p class="contact-label">TELEFONE</p>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+5542999003021'))); ?>" class="contact-value">
                        <?php echo esc_html(get_theme_mod('contact_phone', '(42) 99900-3021')); ?>
                    </a>
                </div>
                
                <div class="contact-info">
                    <p class="contact-label">ESCRITÓRIO</p>
                    <address class="contact-value" style="font-style: normal;">
                        <?php echo nl2br(esc_html(get_theme_mod('contact_address', "Rua 294, 157, Sala 01\nMeia Praia - Itapema/SC"))); ?>
                    </address>
                </div>
                
                <!-- Social Links -->
                <div style="margin-top: 3rem;">
                    <p class="section-label" style="margin-bottom: 1rem;">SIGA-NOS</p>
                    <a href="#" style="font-size: 1rem; text-decoration: none; color: var(--foreground);">Instagram</a>
                </div>

                <!-- WhatsApp -->
                <div style="margin-top: 2rem;">
                    <p class="section-label" style="margin-bottom: 1rem;">WHATSAPP</p>
                    <a href="https://wa.me/5542999003021" target="_blank" rel="noopener noreferrer" class="btn">
                        FALE CONOSCO
                    </a>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div>
                <h2 style="font-size: 1.5rem; font-weight: 300; margin-bottom: 2rem;">Envie uma mensagem</h2>
                
                <?php
                // If using Contact Form 7
                if (shortcode_exists('contact-form-7')) {
                    // Replace with your Contact Form 7 shortcode
                    echo do_shortcode('[contact-form-7 id="YOUR_FORM_ID" title="Formulário de Contato"]');
                } else {
                    // Fallback form
                ?>
                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="contact-form">
                    <input type="hidden" name="action" value="union_contact_form">
                    <?php wp_nonce_field('union_contact_nonce', 'contact_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="name" class="form-label">NOME</label>
                        <input type="text" id="name" name="name" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">E-MAIL</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">TELEFONE</label>
                        <input type="tel" id="phone" name="phone" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject" class="form-label">ASSUNTO</label>
                        <select id="subject" name="subject" class="form-input" required>
                            <option value="">Selecione um assunto</option>
                            <option value="projeto-residencial">Projeto Residencial</option>
                            <option value="projeto-comercial">Projeto Comercial</option>
                            <option value="reforma">Reforma</option>
                            <option value="consultoria">Consultoria</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="form-label">MENSAGEM</label>
                        <textarea id="message" name="message" class="form-textarea" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        ENVIAR MENSAGEM
                    </button>
                </form>
                <?php } ?>
                
                <p style="margin-top: 2rem; color: var(--muted-foreground); font-size: 0.875rem; line-height: 1.6;">
                    Abordamos cada projeto com curiosidade, rigor e compromisso com a excelência. 
                    Nosso processo começa com a escuta, entendendo sua visão, e traduzindo-a 
                    em espaços que superam expectativas.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (optional) -->
<section style="margin-top: 4rem;">
    <div style="height: 400px; background: var(--muted);">
        <!-- Add your Google Maps embed here -->
        <!-- 
        <iframe 
            src="https://www.google.com/maps/embed?pb=YOUR_EMBED_CODE" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
        -->
        <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: var(--muted-foreground);">
            <p>Mapa será exibido aqui</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
