<?php 
    declare(strict_types = 1);

    class NoteController {
        private NoteModel $note_model;

        public function __construct(NoteModel $note_model)
        {
            $this->note_model = $note_model;
        }

        
    }
?>