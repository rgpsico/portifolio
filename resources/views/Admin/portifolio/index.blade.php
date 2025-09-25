@extends('adminlte::page')

@section('title','Usuarios')

@section('content_header')
    <div class="modern-header">
        <h1 class="page-title">
            <i class="fas fa-briefcase me-3"></i>
            Meu Portfólio
        </h1>
        <a href="{{route('portifolio.create')}}" class="btn btn-success btn-modern add-portfolio-btn">
            <i class="fas fa-plus me-2"></i>
            Novo trabalho
        </a>
    </div>
@endsection

@section('css')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        --info-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        --card-shadow: 0 10px 30px rgba(0,0,0,0.1);
        --hover-shadow: 0 20px 60px rgba(0,0,0,0.2);
    }

    .modern-header {
        background: var(--primary-gradient);
        padding: 2rem;
        border-radius: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        box-shadow: var(--card-shadow);
        position: relative;
        overflow: hidden;
    }

    .modern-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }

    .page-title {
        color: white;
        font-weight: 700;
        margin: 0;
        font-size: 2.2rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        position: relative;
        z-index: 2;
    }

    .btn-modern {
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        position: relative;
        z-index: 2;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-modern:hover::before {
        left: 100%;
    }

    .add-portfolio-btn {
        background: var(--success-gradient);
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
    }

    .add-portfolio-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(79, 172, 254, 0.6);
    }

    .portfolio-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        margin-bottom: 2rem;
        opacity: 0;
        transform: translateY(30px);
    }

    .portfolio-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--hover-shadow);
    }

    .portfolio-table {
        margin: 0;
        border: none;
    }

    .portfolio-table thead th {
        background: linear-gradient(45deg, #f8f9fa, #e9ecef);
        color: #495057;
        font-weight: 600;
        border: none;
        padding: 1.5rem 1rem;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .portfolio-table tbody tr {
        border: none;
        transition: all 0.3s ease;
    }

    .portfolio-table tbody tr:hover {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        transform: scale(1.01);
    }

    .portfolio-table td {
        padding: 1.5rem 1rem;
        border: none;
        vertical-align: middle;
    }

    .portfolio-image {
        width: 80px;
        height: 80px;
        border-radius: 15px;
        object-fit: cover;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .portfolio-image:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    .portfolio-title {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1.1rem;
    }

    .portfolio-content {
        color: #6c757d;
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .category-badge {
        background: var(--primary-gradient);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-block;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 500;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-view {
        background: var(--info-gradient);
        color: white;
    }

    .btn-edit {
        background: var(--success-gradient);
        color: white;
    }

    .btn-delete {
        background: var(--danger-gradient);
        color: white;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        color: white;
    }

    .delete-form {
        display: inline-block;
    }

    .pagination-wrapper {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }

    .loading-spinner {
        display: none;
        text-align: center;
        padding: 2rem;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #667eea;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .stats-row {
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-label {
        color: #6c757d;
        font-weight: 500;
        margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .modern-header {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .page-title {
            font-size: 1.8rem;
        }
        
        .portfolio-table {
            font-size: 0.9rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection

@include('Admin.includes.alert')

@section('content')
<!-- Stats Row -->
<div class="row stats-row">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ count($portifolios) }}</div>
            <div class="stat-label">Total de Trabalhos</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $portifolios->groupBy('categoria')->count() }}</div>
            <div class="stat-label">Categorias</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $portifolios->currentPage() }}</div>
            <div class="stat-label">Página Atual</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $portifolios->lastPage() }}</div>
            <div class="stat-label">Total de Páginas</div>
        </div>
    </div>
</div>

<!-- Loading Spinner -->
<div class="loading-spinner">
    <div class="spinner"></div>
    <p class="mt-2">Carregando portfólio...</p>
</div>

<!-- Portfolio Card -->
<div class="portfolio-card">   
    <table class="table portfolio-table table-hover">
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Cover</th>
                <th>Título</th>
                <th>Conteúdo</th>
                <th>Categoria</th>
                <th width="200">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portifolios as $portifolio)
            <tr class="portfolio-row">
                <td>
                    <span class="badge bg-primary">{{ $portifolio->id }}</span>
                </td>
                <td>
                    <img src="{{ Storage::url($portifolio['cover']) }}" 
                         alt="{{ $portifolio->title }}" 
                         class="portfolio-image"
                         loading="lazy">
                </td>
                <td>
                    <div class="portfolio-title">{{ $portifolio->title }}</div>
                </td>
                <td>
                    <div class="portfolio-content" title="{{ strip_tags($portifolio->body) }}">
                        {!! Str::limit($portifolio->body, 100) !!}
                    </div>
                </td>
                <td>
                    <span class="category-badge">{!! $portifolio->categoria !!}</span>
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="#" class="btn-action btn-view">
                            <i class="fas fa-eye me-1"></i>Ver
                        </a>
                        <a href="{{ route('portifolio.edit',['portifolio'=> $portifolio->id]) }}" 
                           class="btn-action btn-edit">
                            <i class="fas fa-edit me-1"></i>Editar
                        </a>
                        
                        <form method="POST" 
                              action="{{ route('portifolio.destroy',['portifolio'=>$portifolio->id]) }}" 
                              class="delete-form" 
                              onsubmit="return confirm('Tem certeza que deseja Excluir?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn-action btn-delete" type="submit">
                                <i class="fas fa-trash me-1"></i>Excluir
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="pagination-wrapper">
    {{ $portifolios->links('pagination::bootstrap-4') }}
</div>

@endsection

@section('js')
<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Registrar ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);
    
    // Mostrar loading inicialmente
    const loadingSpinner = document.querySelector('.loading-spinner');
    const portfolioCard = document.querySelector('.portfolio-card');
    const statsCards = document.querySelectorAll('.stat-card');
    
    loadingSpinner.style.display = 'block';
    portfolioCard.style.opacity = '0';
    
    // Simular carregamento
    setTimeout(() => {
        loadingSpinner.style.display = 'none';
        
        // Animar entrada do cabeçalho
        gsap.from('.modern-header', {
            duration: 1,
            y: -100,
            opacity: 0,
            ease: 'bounce.out'
        });
        
        // Animar stats cards
        gsap.from('.stat-card', {
            duration: 0.8,
            y: 30,
            opacity: 0,
            stagger: 0.1,
            ease: 'power2.out',
            delay: 0.3
        });
        
        // Animar entrada da tabela
        gsap.to('.portfolio-card', {
            duration: 0.8,
            opacity: 1,
            y: 0,
            ease: 'power2.out',
            delay: 0.5
        });
        
        // Animar linhas da tabela
        gsap.from('.portfolio-row', {
            duration: 0.6,
            x: -50,
            opacity: 0,
            stagger: 0.1,
            ease: 'power2.out',
            delay: 0.8
        });
        
        // Animar imagens
        gsap.from('.portfolio-image', {
            duration: 0.8,
            scale: 0,
            rotation: 360,
            stagger: 0.1,
            ease: 'back.out(1.7)',
            delay: 1
        });
        
    }, 1500);
    
    // Hover effects para botões
    document.querySelectorAll('.btn-action').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            gsap.to(this, {
                duration: 0.3,
                scale: 1.05,
                ease: 'power2.out'
            });
        });
        
        btn.addEventListener('mouseleave', function() {
            gsap.to(this, {
                duration: 0.3,
                scale: 1,
                ease: 'power2.out'
            });
        });
    });
    
    // Animação de scroll para stats
    statsCards.forEach(card => {
        const number = card.querySelector('.stat-number');
        const finalNumber = parseInt(number.textContent);
        
        ScrollTrigger.create({
            trigger: card,
            start: 'top 80%',
            onEnter: () => {
                gsap.from({value: 0}, {
                    duration: 1.5,
                    value: finalNumber,
                    ease: 'power2.out',
                    onUpdate: function() {
                        number.textContent = Math.round(this.targets()[0].value);
                    }
                });
            }
        });
    });
    
    // SweetAlert para confirmação de exclusão
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Tem certeza?',
                text: "Esta ação não pode ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar',
                background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                color: '#fff'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Animar saída da linha
                    const row = this.closest('tr');
                    gsap.to(row, {
                        duration: 0.5,
                        x: 100,
                        opacity: 0,
                        ease: 'power2.in',
                        onComplete: () => {
                            this.submit();
                        }
                    });
                }
            });
        });
    });
    
    // Parallax effect no header
    gsap.to('.modern-header::before', {
        scrollTrigger: {
            trigger: '.modern-header',
            scrub: true
        },
        y: 100,
        ease: 'none'
    });
    
    // Lazy loading para imagens
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    gsap.from(img, {
                        duration: 0.6,
                        scale: 0.8,
                        opacity: 0,
                        ease: 'power2.out'
                    });
                    imageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('.portfolio-image').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // Animação do botão "Novo trabalho"
    const addBtn = document.querySelector('.add-portfolio-btn');
    if (addBtn) {
        gsap.set(addBtn, { transformOrigin: 'center' });
        
        addBtn.addEventListener('click', function(e) {
            gsap.to(this, {
                duration: 0.1,
                scale: 0.95,
                yoyo: true,
                repeat: 1,
                ease: 'power2.inOut'
            });
        });
    }
});

// Função para notificações de sucesso
function showSuccessNotification(message) {
    Swal.fire({
        title: 'Sucesso!',
        text: message,
        icon: 'success',
        timer: 3000,
        showConfirmButton: false,
        background: 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
        color: '#fff'
    });
}

// Adicionar efeito de ripple aos botões
document.querySelectorAll('.btn-modern, .btn-action').forEach(button => {
    button.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            pointer-events: none;
            transform: scale(0);
            animation: ripple 0.6s ease-out;
        `;
        
        this.appendChild(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});

// CSS para animação de ripple
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    .btn-modern, .btn-action {
        position: relative;
        overflow: hidden;
    }
`;
document.head.appendChild(style);
</script>
@endsection