<?php $this->title = 'Projet Blog - Supprimer'; ?>

<?php $this->header = '<h3>Voulez-vous vraiment supprimer cet article ?</h3>'; ?>

<?php $this->subheader = '<span class="subheading">Pas de retour en arrière possible !</span>'; ?>

<?php $this->button = '<form class="form" role="form" action="index.php?p=delete&id=' . $_GET['id'] . '" method="post">
                                    <div class="form-actions">
                                        <input type="hidden" id="id" name="id" value="' . $_GET['id'] . '">
                                        <button type="submit" name="submit" class="btn btn-danger">Oui</button>
                                        <a class="btn btn-primary" href="index.php?p=list">Non</a>
                                    </div>
                                </form>'; ?>
