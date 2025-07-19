<?php
if (!isset($href)) {
    $href = 'index.php';
}
?>

<div class="w-full flex justify-center items-center">
    <a href="<?= $href ?>"
        class="flex justify-center items-center rounded-full w-12 h-12 border-2 border-[#30363d] mb-6 hover:scale-[102%] hover:shadow-[0_0_8px_#30363d] transition duration-300 ease-in-out">
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 1L1 11M1 1L11 11" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>
</div>