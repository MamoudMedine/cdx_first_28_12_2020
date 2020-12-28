<div class="p-2 border-t border-theme-40">
    <a class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Déconnexion </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>