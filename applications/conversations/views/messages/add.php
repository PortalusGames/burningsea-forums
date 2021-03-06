<?php if (!defined('APPLICATION')) exit(); ?>
<div id="ConversationForm" class="FormTitleWrapper ConversationForm">
   <?php
   echo Wrap($this->Data('Title'), 'h1', array('class' => 'H'));
   $this->FireEvent('BeforeMessageAdd');

   echo '<div class="FormWrapper">';
   echo $this->Form->Open();
   echo $this->Form->Errors();

   if ($this->Data('MaxRecipients')) {
      echo '<div class="Info">';
      echo Plural($this->Data('MaxRecipients'), "You are limited to %s recipient.", "You are limited to %s recipients.");
      echo '</div>';
   }

   echo '<div class="P">';
      echo $this->Form->Label('Recipients', 'To');
      echo Wrap($this->Form->TextBox('To', array('MultiLine' => TRUE, 'class' => 'MultiComplete')), 'div', array('class' => 'TextBoxWrapper'));
   echo '</div>';

   if (C('Conversations.Subjects.Visible')) {
      echo '<div class="P">';
         echo $this->Form->Label('Subject', 'Subject');
         echo Wrap(
            $this->Form->TextBox('Subject', array('class' => 'InputBox BigInput')),
            'div',
            array('class' => 'TextBoxWrapper'));
      echo '</div>';
   }

   echo '<div class="P">';
   echo $this->Form->BodyBox('Body', array('Table' => 'ConversationMessage', 'FileUpload' => true));
//      echo Wrap($this->Form->TextBox('Body', array('MultiLine' => TRUE)), 'div', array('class' => 'TextBoxWrapper'));
   echo '</div>';

   echo '<div class="Buttons">';
   echo $this->Form->Button('Start Conversation', array('class' => 'Button Primary DiscussionButton'));
   echo Anchor(T('Cancel'), '/messages/inbox', 'Button Cancel');
   echo '</div>';

   echo $this->Form->Close();
   echo '</div>';
   ?>
</div>
